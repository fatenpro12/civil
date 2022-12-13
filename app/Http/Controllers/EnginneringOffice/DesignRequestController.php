<?php

namespace App\Http\Controllers\EnginneringOffice;
use App\Http\Util\CommonUtil;
use Illuminate\Http\Request;
use App\StageProject;
use App\DesignEnginner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Project;
use App\DesignRequest;
use App\Components\User\Models\User;
use App\Notifications\ProjectCreatedNotification;
use App\Notifications\AcceptedRequestOfficeNotification;
use App\Notifications\RejectedRequestOfficeNotification;
use App\Notifications\ShowDesignRequestOffer;
use App\Notifications\DesignRequestSendedToEmployees;


use Notification;
use App\Http\Controllers\Controller;
use App\Http\Resources\DesignRequestResource;
use App\Notifications\DesignRequestEngineerRejected;
use Lang;
class DesignRequestController extends  Controller
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

        $requests = DesignRequest::with('stages','customer','creator','project','offices','designEnginners','designEnginners.media')->WhereIn('status',['sent','rejected','pending','accepted','in_progress','completed'])
        ->where('request_type','design_request')
        ->whereHas('offices',function($q) use ($user){
           $q->where('office_id', $user->id)->orWhere('office_id', $user->parent_id);
        })->orWhereHas('designEnginners', function ($q) use ($user) {
              $q->where('enginner_id', $user->id)->where('is_active', 1);
          });//->get();
    
       $requests = DesignRequestResource::collection($requests->latest()->simplePaginate($rowsPerPage));

       return $this->respondSuccess($requests);
        
      
    }

    public function getStagesDesignRequest(Request $request)
    {
        
        $stages =[];
        $stages_tmp=[];
       // $stages_tmp =[];
       if (isset($request->design_id) ) {
            $stages=StageProject::where('type','design')->orderBy('order')->get();
            $stages_tmp=$stages;
            foreach($stages as $item ){
                $item['employees']=User::getUsersOfficeForRequest($request->office_id['id']);
              //  $item['stages']=$stages;
            }
        }
        $data=[
            'employee_data'=> $stages,
             'stages'=>$stages_tmp

        ];
      //  dd($request->office_id['id']);
        return $data;
    }


    public function acceptDesignRequest(Request $request)
    {

        try {
            $design = DesignRequest::find($request->design_id);
            if($design!=  null){
                DB::beginTransaction();
                foreach($request->stages as $item){
                    DB::table('stages_project_design_request')->insert([
                        'design_id'=>$request->design_id,
                        'enginner_id'=>$item['enginner_id'],
                        'order'=>$item['order'],
                        'stage_id'=> $item['stage_id'],
                        'created_at'=>Carbon::now(),
                        'is_active'=>$item['order']==1 ? 1 : 0,
                        'created_by' => Auth::id()
                    ]);
                        $office = $design->offices->find(Auth::id());
                       // $design->offices()->save($office, ['office_status' => 'pending']);
                        $office->pivot->office_status = 'pending';
                        $office->pivot->update();
                    
                     $data1=[
                         'office_id'=>Auth::user()->id, //$design->office_id,
                          'stage_id'=>$item['stage_id']
                     ];
                    if($item['order']==1){
                        $this->_saveDesignRequestSendedToEmployeesNotifications($item['enginner_id'],$data1);
                    }
                  
                }
                $design->status='pending';
                
                $design->update();
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
    public function rejectDesignRequest(Request $request)
    {

        try {
            $design = DesignRequest::find($request->id);

            if($design!=  null){
                DB::beginTransaction();
                $design->status='rejected';
                $design->update();
                $office = $design->offices->find(Auth::id());
                $office->pivot->office_status = 'rejected';
                 $office->pivot->update();
                 $data1=[
                    'office_id'=>Auth::user()->id,
                ];
                $this->_saveDesignRequestSendedToOwnerNotifications($design->customer_id,$data1);
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
    
    public function sendDesignRequestOffer(Request $request)
    {
        try {
            $design_enginner = DesignEnginner::findOrFail($request->design_enginner_id);
            $design=DesignRequest::find($design_enginner->design_id);
            if($design_enginner!=  null){
                DB::beginTransaction();
               // $design_enginner->price =$request->price;
                $design_enginner->is_sent=1;
                $design_enginner->update();
                
                if($request->pdfPrice){
                $design_enginner->clearMediaCollection('pdfPrice');
                $design_enginner->addMedia($request->pdfPrice)->usingFileName('pdfPrice'.time().'.pdf')->toMediaCollection('pdfPrice');
                }
                $project =Project::find($design->project_id);
                if(Auth::user()->hasRole('Engineer'))
                $office = $design->offices->find(Auth::user()->parent_id);
                else
                $office = $design->offices->find(Auth::user()->id);
                $office->pivot->office_status = 'finished';
                $office->pivot->save();
                ///send notifiaction
                  $data=[
                      'enginner_id'=>$design_enginner->enginner_id,
                      'design_id'=>$design->id,
                      'project_id'=>$design->project_id,
                      'design_enginner_id'=>$design_enginner->id,
                      'stage_id'=>$design_enginner->stage_id
                  ];
                  $this->_saveShowDesignRequestOfferNotifications($project->customer_id,$data);

                if($design_enginner->order==1){
                        $design->status='in_progress';
                        $design->update();
                }
                else{
                    if($design_enginner->order == 4){
                        $design->status='completed';
                        $design->update();
                    }
                    else{
                            $next_design=DesignEnginner::where('design_id',$design_enginner->design_id)->where('order',$design_enginner->order +1)->first();
                            $next_design->is_active=1;
                            $next_design->update();

                            $data1=[
                                'office_id'=>Auth::user()->id,//$design->office_id,
                                'stage_id'=>$next_design->stage_id
                            ];
                            $this->_saveDesignRequestSendedToEmployeesNotifications($next_design->enginner_id,$data1);

                    }
                 
                }

                
              /*  else if($design_enginner->order==4){
                    $design->statue='completed';
                    $design->update();
                }*/

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



    
    public function showDesignRequestDetails(Request $request)
    {

        try {

            $design_enginner = DesignEnginner::with('stage','enginner')->findOrFail($request->design_enginner_id);
            if($design_enginner!=  null){
                return $this->respondSuccess($design_enginner);
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





    //////////////////////////////////Notifications///////////////////////
    protected function _saveProjectCreatedNotifications($members, $project_id)
    {
        foreach ($members as $member){
            $notifiable_users = User::find($member);
            Notification::send($notifiable_users, new ProjectCreatedNotification($project_id));
        }
    }

    protected function _saveRejectedRequestNotifications($member, $office_id)
    {
       // foreach ($members as $member){
            $notifiable_users = User::find($member);
            Notification::send($notifiable_users, new RejectedRequestOfficeNotification($office_id));
        //}
    }

    protected function _saveAcceptedRequestNotifications($member, $office_id)
    {
        //foreach ($members as $member){
            $notifiable_users = User::find($member);
            Notification::send($notifiable_users, new AcceptedRequestOfficeNotification($office_id));
      //  }
    }



    protected function _saveShowDesignRequestOfferNotifications($member, $data)
    {
        //foreach ($members as $member){
            $notifiable_users = User::find($member);
            Notification::send($notifiable_users, new ShowDesignRequestOffer($data));
      //  }
    }

    
    
    protected function _saveDesignRequestSendedToEmployeesNotifications($member, $data)
    {
        //foreach ($members as $member){
            $notifiable_users = User::find($member);
            Notification::send($notifiable_users, new DesignRequestSendedToEmployees($data));
     }
     protected function _saveDesignRequestSendedToOwnerNotifications($member, $data)
     {
         //foreach ($members as $member){
             $notifiable_users = User::find($member);
             Notification::send($notifiable_users, new DesignRequestEngineerRejected($data));
      }
}
