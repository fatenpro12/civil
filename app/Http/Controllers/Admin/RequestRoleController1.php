<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\RequestRole;
use Notification;
use App\Http\Responses\Response;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Notifications\AskPermissionNotification;

class RequestRoleController extends Controller
{
    //
   
    public function index()
    {
        $rowsPerPage = (request()->get('rowsPerPage') > 0) ? request()->get('rowsPerPage') : 0;
        $sort_by = request()->get('sort_by');
        $descending = request()->get('descending');
       

        if ($descending == 'false') {
            $orderby = 'asc';
        } elseif ($descending == 'true') {
            $orderby = 'desc';
        } elseif ($descending == '') {
            $orderby = 'desc';
            $sort_by = 'id';
        }

        $requests = RequestRole::
                           // ->where('notable_type', 'App\Project')
                            with('user','role')
                            ->orderBy($sort_by, $orderby)
                            ->paginate($rowsPerPage);

        return $this->respond($requests);

        // $input = $request->only('category_id', 'transaction_date', 'due_date', 'ref_no', 'total', 'expense_for', 'project_id', 'notes');
        // $input['created_by'] = $request->user()->id;
        // $input['payment_status'] = 'due';
        // $input['type'] = 'expense';
        // $input['status'] = 'final';

        // //generate ref_no. if ref_no is empty
        // if (empty($input['ref_no'])) {
        //     $input['ref_no'] = $this->CommonUtil->generateReferenceNo('expense');
        // }
        // $transaction = Transaction::create($input);

        // $output = $this->respondSuccess(__('messages.saved_successfully'));
  
    }



    public function store(Request $request)
    {
       
    }




    protected function _saveAskedPermissionNotifications($member, $data)
    {
            $notifiable_users = User::find($member);
            Notification::send($notifiable_users, new AskPermissionNotification($data));
    }


//     public function show($id)
//     {
//         //echo 'mehyaaaa';
//     //    die();
//         try {
//            // $project_id = request()->get('project_id');
//             $report = Report::findOrFail($id);
//                               //  ->
// //where('notable_id', $project_id)
//             $output = $this->respond($report);
//         } catch (Exception $e) {
//             $output = $this->respondWentWrong($e);
//         }
//         return $output;
//     }




//     public function update(Request $request, $id)
//     {
//         try {
//             DB::beginTransaction();

//             $data = $request->only('name', 'description');

//             $project_id = $request->get('project_id');
//             $report = Report::findOrFail($id);
                               

//             $report->name = $data['name'];
//             $report->description = $data['description'];
//             $report->save();

//             // //Add medias for project
//             // if (!empty($request->medias)) {
//             //     $this->addMedias($request->medias, $project_note, 'project_note');
//             // }
//             DB::commit();

//             $output = $this->respondSuccess();
//         } catch (Exception $e) {
//             DB::rollBack();
//             $output = $this->respondWentWrong($e);
//         }
//         return $output;
//     }


//        /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy($id)
//     {
//         try {
//             $project_id = request()->get('project_id');
//             $note = Report::findOrFail($id);
                      
//             $note->delete();

//             $output = $this->respondSuccess();
//         } catch (Exception $e) {
//             $output = $this->respondWentWrong($e);
//         }
//         return $output;
//     }


}
