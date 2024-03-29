<?php

namespace App\Http\Controllers;

use App\Components\User\Models\User;
use App\Customer;
use App\Http\Util\CommonUtil;
use App\InvoiceLine;
use App\InvoiceScheme;
use App\Notifications\InvoiceReminder;
use App\Notifications\SendInvoiceToCustomer;
use App\Project;
use App\System;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Notification;

class InvoiceController extends Controller
{
    /**
     * All Utils instance.
     */
    protected $commonUtil;

    /**
     * Constructor.
     *
     * @param CommonUtil
     */
    public function __construct(CommonUtil $commonUtil)
    {
        $this->CommonUtil = $commonUtil;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project_id = request()->get('project_id');

       /* if (!empty($project_id) && (!request()->user()->can('project.'.$project_id.'.invoice.view'))) {
            abort(403, 'Unauthorized action.');
        }*/

        $rowsPerPage = (request()->get('rowsPerPage') > 0) ? request()->get('rowsPerPage') : 0;
        $sort_by = request()->get('sort_by');
        $descending = request()->get('descending');

        if ('false' == $descending) {
            $orderby = 'asc';
        } elseif ('true' == $descending) {
            $orderby = 'desc';
        } elseif ('' == $descending) {
            $orderby = 'desc';
            $sort_by = 'id';
        }

        $transactions = Transaction:://where('transactions.type', 'invoice')
            leftjoin('users', 'transactions.customer_id', '=', 'users.id')
            ->leftjoin('projects', 'transactions.project_id', '=', 'projects.id')
          ->select('ref_no as invoice_number', 'transactions.title', 'transaction_date as invoice_date', 'due_date', 'total', 'transactions.id as id', 'payment_status','users.name as customer', 'project_id', 'projects.name as project', 'transactions.status as type');

        if (!empty($project_id)) {
            $transactions->where('project_id', $project_id);
        }

        if (!empty(request()->get('customer_id'))) {
            $transactions->where('transactions.customer_id', request()->get('customer_id'));
        }

        if (!empty(request()->get('payment_status'))) {
            $transactions->where('payment_status', request()->get('payment_status'));
        }

        if (!empty(request()->get('status'))) {
            $transactions->where('transactions.status', request()->get('status'));
        } else {
            $transactions->where('transactions.status', '!=', 'estimate');
        }

        $transactions = $transactions//->orderBy($sort_by, $orderby)
                        ->paginate($rowsPerPage);

        foreach ($transactions as $transaction) {
            $transaction->append('download_url');
        }

        $data = ['transactions' => $transactions];



        return $this->respond($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project_id = request()->get('project_id');

       if (!request()->user()->can('invoices.create')) {
            abort(403, 'Unauthorized action.');
        }
        $customers=[];
        $project = Project::find($project_id);
        if($project)
        $customers = $project->owners; //User::getCustomers();//Customer::getCustomersForDropDown();
        $discount_type = Transaction::getDiscountType();
        $invoice_type = Transaction::getInvoiceType();
      //  $invoice_schemes = InvoiceScheme::forDropDown();
        $default_invoice_scheme = InvoiceScheme::getDefault();
      //  dd(Transaction::getCurrencies());
        $currencies= Transaction::getCurrencies();
        $data = [
                    'project' => $project,
                    'customers' => $customers,
                    'discount_type' => $discount_type,
                    'invoice_type' => $invoice_type,
                  //  'invoice_schemes' => $invoice_schemes,
                    'default_invoice_scheme' => !empty($default_invoice_scheme) ? $default_invoice_scheme->id : null,
                    'currencies' => $currencies
                ];

        return $this->respond($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project_id = $request->input('project_id');

        if (!request()->user()->can('invoices.create')) {
            abort(403, 'Unauthorized action.');
        }

        try {
            DB::beginTransaction();

            $input = $request->only(
                'project_id',
                'title',
                'customer_id',
                'contact_id',
                'transaction_date',
                'due_date',
                'discount_type',
                'discount_amount',
                'total',
                'terms',
                'notes',
                'status',
                'invoice_scheme_id',
                'currency'
            );
            $input['created_by'] = $request->user()->id;
            $input['payment_status'] = 'due';
            $input['type'] = 'invoice';
$input['ref_no'] = $input['status'].rand();
            //autogenerate invoice no.
           /* if ('final' == $input['status']) {
                $input['ref_no'] = $this->CommonUtil->generateInvoiceNo($input['invoice_scheme_id']);
            } else {
                $input['ref_no'] = $input['status'].rand();
            }*/

            $invoice_lines = $request->only('invoice_lines');
            $invoice_line = [];
            foreach ($invoice_lines as $key => $values) {
                foreach ($values as $value) {
                    unset($value['display_long_description']);
                    $invoice_line[] = $value;
                }
            }

            $transaction = Transaction::create($input);
            $transaction->invoiceLines()->createMany($invoice_line);

            if (!empty($request->input('do_mail'))) {
                $this->_sendInvoiceEmailToCustomer($transaction->id, $input['customer_id'], $input['contact_id']);
            }

            DB::commit();

            $output = $this->respondSuccess(__('messages.saved_successfully'));
        } catch (\Exception $e) {
            DB::rollBack();
            $output = $this->respondWentWrong($e);
        }

        return $output;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project_id = request()->get('project_id');

        if (!request()->user()->can('invoices.view')) {
            abort(403, 'Unauthorized action.');
        }

        $transaction = Transaction::OfTransaction('invoice')
                        ->where('project_id', $project_id)
                        ->with('invoiceLines', 'payments','customer')
                        ->find($id);

       // $customer = Customer::with('currency')->find($transaction->customer_id);

        $data = [
                'transaction' => $transaction,
              //  'customer' => $customer,
            ];

        return $this->respond($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project_id = request()->get('project_id');

        if (!request()->user()->can('invoices.edit')) {
            abort(403, 'Unauthorized action.');
        }

        $invoice = Transaction::with('invoiceLines')
                                ->OfTransaction('invoice')
                                ->where('type', 'invoice')
                                ->find($id);
$project=Project::find($project_id);
        $customers = $project->owners;//Customer::getCustomersForDropDown();
        $discount_type = Transaction::getDiscountType();
        $invoice_type = Transaction::getInvoiceType();
      //  $invoice_schemes = InvoiceScheme::forDropDown();

        $invoice_line = [];
        foreach ($invoice->invoiceLines as $line) {
            if (!empty($line['long_description'])) {
                $line['display_long_description'] = true;
            } else {
                $line['display_long_description'] = false;
            }
            $invoice_line[] = $line;
        }
        $currencies= Transaction::getCurrencies();
        $data = [
                    'invoice' => $invoice,
                    'customers' => $customers,
                    'discount_type' => $discount_type,
                    'invoice_line' => $invoice_line,
                    'invoice_type' => $invoice_type,
                   // 'invoice_schemes' => $invoice_schemes,
                    'currencies' => $currencies
                ];

        return $this->respond($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project_id = $request->input('project_id');

        if (!request()->user()->can('invoices.edit')) {
            abort(403, 'Unauthorized action.');
        }

        try {
            DB::beginTransaction();

            $input = $request->only(
                'project_id',
                'title',
                'customer_id',
                'contact_id',
                'transaction_date',
                'due_date',
                'discount_type',
                'discount_amount',
                'total',
                'terms',
                'notes',
                'status',
                'invoice_scheme_id',
                'currency'
            );

            $transaction = Transaction::where('project_id', $input['project_id'])
                    ->find($id);

            //autogenerate invoice no.
          /*  if ('final' !== $transaction['status'] && $input['status'] == 'final') {
                $input['ref_no'] = $this->CommonUtil->generateInvoiceNo($input['invoice_scheme_id']);
            }*/

            $transaction->update($input);

            //add check for invoice line which doesn't exist
            $invoice_lines = $request->input('invoice_lines');
            $invoice_line = [];
            $existing_line_id = [];
            foreach ($invoice_lines as $line) {
                if (!empty($line['id'])) {
                    $existing_line_id[] = $line['id'];
                    unset($line['created_at'], $line['updated_at'], $line['display_long_description']);
                    InvoiceLine::where('transaction_id', $id)
                            ->where('id', $line['id'])
                            ->update($line);
                } else {
                    unset($line['display_long_description']);
                    $invoice_line[] = $line;
                }
            }

            //delete invoice_line which is not exist
            InvoiceLine::where('transaction_id', $id)
                        ->whereNotIn('id', $existing_line_id)
                        ->delete();

            //create invoice lines
            $transaction->invoiceLines()->createMany($invoice_line);

            //send email about invoice to customer
            if (!empty($request->input('do_mail'))) {
                $this->_sendInvoiceEmailToCustomer($transaction->id, $input['customer_id'], $input['contact_id']);
            }

            DB::commit();

            $output = $this->respondSuccess(__('messages.updated_successfully'));
        } catch (Exception $e) {
            DB::rollBack();
            $output = $this->respondWentWrong($e);
        }

        return $output;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project_id = request()->get('project_id');

        if (!request()->user()->can('project.'.$project_id.'.invoice.delete')) {
            abort(403, 'Unauthorized action.');
        }

        try {
            $transaction = Transaction::where('project_id', $project_id)
                                ->find($id);

            $transaction->delete();

            InvoiceLine::where('transaction_id', $id)
                        ->delete();

            $output = $this->respondSuccess(__('messages.deleted_successfully'));
        } catch (Exception $e) {
            $output = $this->respondWentWrong($e);
        }

        return $output;
    }

    /**
     * send email to customer &
     * customers contact.
     *
     * @return \Illuminate\Http\Response
     */
    protected function _sendInvoiceEmailToCustomer($transaction_id, $customer_id, $contact_id = null)
    {
        $customer = Customer::find($customer_id);

        $send_invoice[] = $customer;

        if (!is_null($contact_id)) {
            $contact[] = User::find($contact_id);
            $send_invoice = array_merge($send_invoice, $contact);
        }

        $transaction = Transaction::find($transaction_id);
        $transaction->append('invoice_name');

        $pdf = $this->CommonUtil->generateInvoicePdf($transaction_id);

        Notification::send($send_invoice, new SendInvoiceToCustomer($transaction, $customer, $pdf));
    }

    /**
     * Download Invoice
     * in Pdf Format.
     *
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {

        $invoice = Transaction::with('invoiceLines', 'customer')
        ->find($id);

$keys = ['tax_number', 'email', 'mobile', 'city', 'state', 'zip_code', 'country', 'logo', 'alternate_contact_no', 'address_line_1', 'address_line_2'];
$system = System::getSystemSettings($keys);

        $line_tax = 0;
        $line_total =0;
        $subtotal = 0;

        $total_tax = 0;

        $rate = 0;
        $tax = 0;
        $total = 0;
        $quantity = 0;
        foreach($invoice->invoiceLines as $line){
        $line_tax += $line->tax;
        $line_total += $line->total;
        $currency = $invoice->currency;

        $subtotal = $currency.' '.(number_format($line_total, 2));

        $total_tax = $currency.' '.(number_format($line_tax, 2));

        $rate = number_format($line->rate, 2);
        $tax = number_format($line->tax, 2);
        $total = number_format($line->total, 2);
        $quantity = number_format($line->quantity, 2) .' '. $line->unit;
        }
        return response()->json([
            'invoice' => $invoice,
            'line_tax' => $line_tax,
            'line_total' => $line_total,
            'subtotal' => $subtotal,
            'total_tax' => $total_tax,
            'rate' => $rate,
            'tax' => $tax,
            'total' => $total,
            'quantity' => $quantity,
            'invoice_total' => $invoice->currency.' '.(number_format($invoice->total, 2)),
            'discount_amount' => $invoice->currency.' '.(number_format($invoice->discount_amount, 2)),
            'system' =>$system
        ]);
     //   return $pdf->download($transaction->invoice_name);
    }

    /**
     * Retrives data needed for Invoice list filter.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFilterData()
    {
        $projects = Project::getProjectsList(true);
        $customers = Customer::getCustomersForDropDown(true);
        $payment_statuses = Transaction::paymentStatuses(true);

        $data = [
            'projects' => $projects,
            'customers' => $customers,
            'payment_statuses' => $payment_statuses,
        ];

        return $this->respond($data);
    }

    /**
     * Convert Draft and Estimate
     * To Final Invoice.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function ConvertToInvoice($id)
    {
        try {
            $project_id = request()->get('project_id');
            $transaction = Transaction::where('project_id', $project_id)
                        ->find($id);

            //autogenerate invoice number
          //  $invoice_number = $this->CommonUtil->generateInvoiceNo($transaction->invoice_scheme_id);

            $transaction->ref_no = $invoice_number;
            $transaction->status = 'final';
            $transaction->save();

            $output = $this->respondSuccess(__('messages.updated_successfully'));
        } catch (Exception $e) {
            $output = $this->respondWentWrong($e);
        }

        return $output;
    }

    /**
     * get invoice reminder
     * template and all datas
     *
     * @param \Illuminate\Http\Response
     *
     */
    public function getInvoiceReminder()
    {
        $transaction_id = request()->get('transaction_id');
        $project_id = request()->get('project_id');
        $transaction = Transaction::OfTransaction('invoice')
                        ->where('project_id', $project_id)
                        ->with('customer', 'project')->find($transaction_id);

        $invoice_template = System::getValue('invoice_reminder_template', $json_decode = true);

        $reminder['subject'] = preg_replace(["/{customer_name}/", "/{project_name}/", "/{invoice_number}/", "/{due_date}/", "/{company_name}/"], [$transaction->customer->company, $transaction->project->name, $transaction->ref_no, $transaction->due_date, config('app.name')], $invoice_template['subject']);

        $reminder['body'] = preg_replace(["/{customer_name}/", "/{project_name}/", "/{invoice_number}/", "/{due_date}/", "/{company_name}/"], [$transaction->customer->company, $transaction->project->name, $transaction->ref_no, $transaction->due_date, config('app.name')], $invoice_template['body']);

        $reminder['email'] = $transaction->customer->email;
        $reminder['attachment'] = $invoice_template['attachment'];

        return $this->respond($reminder);
    }

    /**
     * send invoice reminder
     * to the customer
     *
     * @param \Illuminate\Http\Response
     *
     */
    public function postInvoiceReminder(Request $request)
    {
        try {
            if ($this->isDemo()) {
                return $this->respondDemo();
            }

            $transaction_id = $request->input('transaction_id');
            $transaction = Transaction::OfTransaction('invoice')
                                ->with('customer')
                                ->find($transaction_id);

            $data = $request->only('email', 'subject', 'body');
            if (!empty($request->input('attachment'))) {
                $pdf = $this->CommonUtil->generateInvoicePdf($transaction_id);
                $transaction->append('invoice_name');
                $data['name'] = $transaction->invoice_name;
                $data['pdf'] = $pdf;
            }

            $customer = $transaction->customer;
            $customer['email'] = $data['email'];
            $customer->notify(new InvoiceReminder($data));

            $output = $this->respondSuccess(__('messages.success'));
        } catch (Exception $e) {
            $output = $this->respondWentWrong($e);
        }
        return $output;
    }

    /**
     * Get statistics for invoice
     *
     * @return \Illuminate\Http\Response
     */
    public function getStatistics()
    {
        if (!request()->user()->hasRole('superadmin')) {
            abort(403, 'Unauthorized action.');
        }

        $currency = System::getBusinessCurrency('currency_id');

        //payment status
        $transaction = Transaction::OfTransaction('invoice')
                                ->where('status', 'final');

        if (!empty(request()->get('project_id'))) {
            $transaction->where('transactions.project_id', request()->get('project_id'));
        }

        $payment_stats = $transaction->select(
            'payment_status',
            DB::raw('count(id) as payment_status_count')
            )
            ->groupBy('payment_status')
            ->get();

        //transaction Amount calculation
        $paid_amount = Transaction::OfTransaction('invoice')
                            ->where('status', 'final')
                            ->leftjoin('transaction_payment_lines as tpl', 'transactions.id', '=', 'tpl.transaction_id');

        if (!empty(request()->get('project_id'))) {
            $paid_amount->where('transactions.project_id', request()->get('project_id'));
        }

        $paid_amount = $paid_amount->select(DB::raw("SUM(amount * conversion_rate) as paid_amount"))
        ->first();

        $data = ['payment_stats' => $payment_stats, 'currency' => $currency, 'paid_amount' => $paid_amount];

        return $this->respond($data);
    }
}
