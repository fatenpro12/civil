<?php

namespace App\Http\Controllers\SupportService;
use App\Http\Util\CommonUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\DesignRequest;

use App\Components\User\Models\User;
use Notification;
use App\Http\Controllers\Controller;
use Lang;
use App\Notifications\AcceptRequestSendedFromSupportServiceOffice;

class SupportServiceRequestController extends  Controller
{
    protected $commonUtil;

    public function __construct(CommonUtil $commonUtil)
    {
        $this->CommonUtil = $commonUtil;
    }
    public function index(Request $request)
    {
        $user=User::find(Auth::user()->id);
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

        $requests = DesignRequest::with('stages','customer','service_type','creator','project','offices','media')->WhereIn('status',['sent','rejected','pending','accepted','in_progress','completed'])
        ->where('request_type','support_service_request')
        ->whereHas('offices',function($q) use ($user){
           $q->where('office_id', $user->id);//->orWhere('office_id', $user->parent_id);
        });
        $requests = $requests->orderBy($sort_by, $orderby)
                    ->paginate($rowsPerPage);

       return $this->respondSuccess($requests);
        
      
    }
    public function acceptSupportServiceRequest(Request $request)
    {
           try {
            $design = DesignRequest::find($request->design_id);
          //  dd($design,$request->all());
            if($design!=  null){
                DB::beginTransaction();
                        $office = $design->offices->find(Auth::id());
                        
                        $office->pivot->office_status = 'finished';
                        $office->pivot->update();

                $design->status='pending';
                $design->update();
             
                if($request->pdfPrice){
                    $design->clearMediaCollection('pdfPriceSupportService');
                    $design->addMedia($request->pdfPrice)->usingFileName('pdfPriceSupportService'.time().'.pdf')->toMediaCollection('pdfPriceSupportService');
                    }
                //notification to owner
                 $data1=[
                    'office_id'=>Auth::user()->id,//$design->office_id,
                ];
                $this->_saveSupportServiceRequestNotifications($design->created_by,$data1);
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
    //////////////////////////////////Notifications///////////////////////

    protected function _saveSupportServiceRequestNotifications($member, $data)
    {
            $notifiable_users = User::find($member);
            Notification::send($notifiable_users, new AcceptRequestSendedFromSupportServiceOffice($data));
     }
}
