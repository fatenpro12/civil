<?php

namespace App\Http\Controllers\EstateOwner;
use App\Http\Util\CommonUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\DesignRequest;

use App\Components\User\Models\User;
use App\Notifications\AcceptContractorRequestByEstateOwner;
use App\Notifications\RejectContractorRequestByEstateOwner;



use Notification;
use App\Http\Controllers\Controller;
use Lang;
use App\Http\Responses\Response;
use App\Notifications\AskContractorRequestOffer;
use App\Notifications\RequestSenderNotification;

class ContractorRequestController extends  Controller
{
    protected $commonUtil;

    public function __construct(CommonUtil $commonUtil)
    {
        $this->CommonUtil = $commonUtil;
    }


    public function index(Request $request)
    {
        $user=User::find(request()->user()->id);
        $rowsPerPage = ($request->get('rowsPerPage') > 0) ? $request->get('rowsPerPage') : 0;
        $sort_by = $request->get('sort_by');
        $descending = $request->get('descending');

        if ($descending == 'false') {
            $orderby = 'asc';
        } elseif ($descending == 'true') {
            $orderby = 'desc';
        } elseif ($descending == '') {
            $orderby = 'desc';
            $sort_by = 'id';
        }

        $childrens=$user->childrenIds($user->id);
        array_push($childrens,$user->id);
        
        $requests = DesignRequest::with('customer','offices','project','project.location','media','location')
        ->whereIn('customer_id', $childrens)
        ->where('request_type','contractor_request');

        $requests = $requests->latest()
        ->simplePaginate($rowsPerPage);

       return $this->respondSuccess($requests);
        
      
    }

    public function acceptContractorRequestOffer(Request $request)
    {
       // dd($request->all());
        try {
            $design=DesignRequest::find($request->design_id);
            if($design!=  null){
                DB::beginTransaction();
               $design->status='completed';
               $design->update();
               $office = $design->offices->find($request->office_id);
               $office->pivot->office_status = 'accepted';
               $office->pivot->update();
               $data = [
                'estate_id' => Auth::id()
            ];
           
            $this->_saveAcceptContractorRequestByEstateOwnerNotifications($request->office_id,$data);
                DB::commit();
                $message = Lang::get('site.success_update');
                return $this->respondSuccess($message);
            }
            else{
                $message = Lang::get('site.object_not_found');
                return $this->respondWentWrong($message);
            }

        }
         catch (Exception $e) {
            $output = $this->respondWentWrong($e);
            return $output ;
        }
    }
    public function rejectContractorRequestOffer(Request $request)
    {
        try {
            $design=DesignRequest::find($request->design_id);
            if($design!=  null){
                DB::beginTransaction();
                $design->update();
                $office = $design->offices->find($request->office_id);
                $office->pivot->office_status = 'rejected';
                $office->pivot->update();
                $office->save();
                $data = [
                'estate_id' => Auth::id()
            ];
                $this->_saveRejectContractorRequestByEstateOwnerNotifications($request->office_id,$data);
                DB::commit();
                $message = Lang::get('site.success_update');
                return $this->respondSuccess($message);
            }
            else{
                $message = Lang::get('site.object_not_found');
                return $this->respondWentWrong($message);
            }

        }
         catch (Exception $e) {
            $output = $this->respondWentWrong($e);
            return $output ;
        }
    }
    public function store(Request $request)
    {
        $validate = validator($request->all(), [
                'customer_id' => 'required',
                'project_id' => 'required',
                'office_id' => 'required',
            ],
            [
                'required'  => 'The :attribute field is required.',
            ]
        );
        if ($validate->fails()) {
            return $this->respondWithError($validate->errors()->first());
        }

        try {

            $design=DesignRequest::where('project_id', $request->project_id)
            ->whereIn('status',['sent','new','accepted','in_progress','sent'])
            ->where('request_type','contractor_request')->first();
            if($design != null){
              $message=__('messages.same_project_request');
              return  $this->respondSuccess($message);
            }
            DB::beginTransaction();
            $input = $request->all();
            $input['created_by'] = Auth::id();
            $input['status']= $request->sent==0 ? 'new' : 'sent';

            //$designRequest = DesignRequest::create($input);
              $designRequest =new DesignRequest();
            $designRequest->created_by=$input['created_by'];
            $designRequest->status=$input['status'];
            $designRequest->customer_id=$input['customer_id'];
            $designRequest->project_id=$input['project_id'];
            $designRequest->location_id=$request->location_id;
            $designRequest->sent=$input['sent'];
            $designRequest->note=$request->note;
            $designRequest->request_type = 'contractor_request';
            $designRequest->save();
           // $designRequest->offices()->attach($input['office_id']);
            $designRequest->offices()->attach($input['office_id'], ['office_status' => 'recieved','request_type' => 'contractor_request']);
            
            $this->_saveAskSenderDesignRequestNotifications(['request_id'=>$designRequest->id, 'estate_id'=> Auth::id(),'request_type'=>'contractor request']);
            if($designRequest->sent== 1){
                 $this->_saveAskContractorRequestOfferNotifications($input['office_id'], Auth::id());
            }

            DB::commit();
            return $this->respondSuccess(__('messages.saved_successfully'));
        }

         catch (Exception $e) {
            $output = $this->respondWentWrong($e);
        }

    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $validate = validator($request->all(), [
                'customer_id' => 'required',
                'project_id' => 'required',
                'office_id' => 'required',
            ],
            [
                'required'  => 'The :attribute field is required.',
            ]
        );
        if ($validate->fails()) {
            return $this->respondWithError($validate->errors()->first());
        }
        try {
            $design=DesignRequest::with('offices')->find($id);
            if($design!=  null){
                DB::beginTransaction();
                $input = $request->all();
                $design->customer_id=$request->customer_id;
                $design->project_id=$request->project_id;
                $design->note=$request->note;
                $design->update();
                $design->offices()->detach();
                foreach($input['office_id'] as $office)
                $design->offices()->attach($office, ['office_status' => 'recieved','request_type' => 'contractor_request']);
                DB::commit();
                $message = Lang::get('site.success_update');
                return $this->respondSuccess($message);
            }
            else{
                $message = Lang::get('site.object_not_found');
                return $this->respondWentWrong($message);
            }

        }
         catch (Exception $e) {
            $output = $this->respondWentWrong($e);
        }



    }


  

    public function show($id)
    {
        $request = DesignRequest::with('customer','project','offices')->findOrFail($id);
        $request = DesignRequest::find($id);
        if($request!=  null){
            return $this->respondSuccess($request);
        }
        else{
            $message = Lang::get('site.object_not_found');
            return $this->respondWentWrong($message);
       
        }
       
    }


       /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{

            $request = DesignRequest::find($id);
            if($request!=  null){
                $request->authors()->detach($request->offices);
                $request->delete();
                return  $this->respondSuccess(__('messages.deleted_successfully'));
            }
            else{
                $message = Lang::get('site.object_not_found');
                return $this->respondWentWrong($message);
            }
         
        }catch(\Exception $e){
           return  $this->respondWentWrong($e);
        }
        return $output;
    }


    protected function _saveAskSenderDesignRequestNotifications($request_id)
    {
      //  foreach ($members as $member){
     //       $notifiable_users = User::find($member);
            Notification::send(Auth::user(), new RequestSenderNotification($request_id));
     //   }
    }
    protected function _saveAskContractorRequestOfferNotifications($members, $estate_id)
    {
        foreach ($members as $member){
            $notifiable_users = User::find($member);
            Notification::send($notifiable_users, new AskContractorRequestOffer($estate_id));
        }
    }

    protected function _saveAcceptContractorRequestByEstateOwnerNotifications($member,$data)
    {
            $notifiable_users = User::find($member);
            Notification::send($notifiable_users, new AcceptContractorRequestByEstateOwner($data));
    }
    protected function _saveRejectContractorRequestByEstateOwnerNotifications($member,$data)
    {
            $notifiable_users = User::find($member);
            Notification::send($notifiable_users, new RejectContractorRequestByEstateOwner($data));
    }
}
