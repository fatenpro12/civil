<?php

namespace App\Http\Controllers\EstateOwner;
use App\Http\Util\CommonUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\DesignRequest;

use App\Components\User\Models\User;
use App\Notifications\ProjectCreatedNotification;
use App\Notifications\AcceptedRequestOfficeNotification;
use App\Notifications\RejectedRequestOfficeNotification;
use App\Notifications\AcceptDesignRequestByEstateOwner;
use App\Notifications\RejectDesignRequestByEstateOwner;
use App\Notifications\AskDesignRequestOffer;
use App\Notifications\DesignRequestSendedToEmployees;


use Notification;
use App\Http\Controllers\Controller;
use Lang;
use App\DesignEnginner;
use App\Http\Responses\Response;
use App\Notifications\AskContractorRequestOffer;
use App\Notifications\AskSupportServiceRequestOffer;
use App\Notifications\RequestSenderNotification;

class DesignRequestController extends  Controller
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
        
        $requests = DesignRequest::with('stages','location','customer','offices','project','project.location','designEnginners','designEnginners.media')
        ->where('request_type','design_request')
        ->whereIn('customer_id', $childrens);
        
        $requests = $requests->latest()
        ->simplePaginate($rowsPerPage);

       return $this->respondSuccess($requests);
        
      
    }

    public function acceptDesignRequestOffer(Request $request)
    {
      // dd($request->all());
        try {
            $design_enginners = DesignEnginner::where('created_by',$request->created_by)
            ->where('design_id',$request->design_id)->get();
            $design=DesignRequest::find($request->design_id);
            if($design!=  null){
                DB::beginTransaction();
               // $design_enginner->price =$request->price;
               $design->status='completed';
               $design->update();
               foreach($design_enginners as $design_enginner) {
                $design_enginner->is_agreed=1;
                $design_enginner->is_active=1;
                $design_enginner->update();
            
                $data1=[
                    'office_id'=>$design_enginner->created_by,
                    'stage_id'=>$design_enginner->stage_id
                  ];
                  
                  $this->_saveDesignRequestSendedToEmployeesNotifications($design_enginner->enginner_id,$data1);
               }
               $office = $design->offices->find($request->created_by);
                       // $design->offices()->save($office, ['office_status' => 'pending']);
                        $office->pivot->office_status = 'accepted';
                        $office->pivot->update();
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
    public function rejectDesignRequestOffer(Request $request)
    {
        try {
            $design_enginners = DesignEnginner::where('created_by',$request->created_by)
            ->where('design_id',$request->design_id)->get();
            $design=DesignRequest::find($request->design_id);
            if($design!=  null){
                DB::beginTransaction();
                $design->update();
               foreach($design_enginners as $design_enginner) {
                $design_enginner->is_rejected=1;
                $design_enginner->update();
                $data1=[
                    'office_id'=>$design_enginner->created_by,
                    'stage_id'=>$design_enginner->stage_id
                  ];
              //    $this->_saveDesignRequestSendedToEmployeesNotifications($design_enginner->enginner_id,$data1);
               }
               $office = $design->offices->find($request->created_by);
               $office->pivot->office_status = 'rejected';
               $office->pivot->update();
               $office->save();
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
      //  dd($request->all());
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
            ->where('request_type','design_request')
            ->whereIn('status',['sent','new','accepted','in_progress','sent'])->first();
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
            $designRequest->sent=$input['sent'];
            $designRequest->location_id=$request->location_id;
            $designRequest->note=$request->note;
            $designRequest->request_type = 'design_request';
            $designRequest->save();

           $designRequest->offices()->attach($input['office_id'], ['office_status' => 'recieved','request_type' => 'design_request']);

           $this->_saveAskSenderDesignRequestNotifications(['request_id'=>$designRequest->id, 'estate_id'=> Auth::id(),'request_type'=>'design request']);
            if($designRequest->sent== 1){
                 $this->_saveAskDesignRequestOfferNotifications($input['office_id'], Auth::id());
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
            $design=DesignRequest::where('project_id', $request->project_id)->whereIn('status',['sent','new','accepted','in_progress','sent'])->first();
          /*  dd($request->all());
            if($design != null){
              return  $this->respondWentWrong('هناك طلب تصميم لنفس المشروع  في مرحلة العمل');
            }*/
           
            if($design!=  null){
                DB::beginTransaction();
                $design->customer_id=$request->customer_id;
                $design->project_id=$request->project_id;
                $design->note=$request->note;
                $design->update();
                $design->offices()->detach();
                $design->offices()->attach($request->office_id, ['office_status' => 'recieved','request_type' => 'design_request']);
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
        $request = DesignRequest::with('stages','customer','project','project.location','office')->findOrFail($id);
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




    
    

    public function confirmDesign(Request $request)
    {

        try {
            $design = DesignRequest::find($request->design_id);
            
            if($design!=  null){
                DB::beginTransaction();
                $design->status='sent';
                $design->sent=1;
                $design->update();

                $this->_saveAskDesignRequestOfferNotifications([$design->office_id], Auth::id());

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

    public function acceptDesign(Request $request)
    {

        try {
            $design_enginner = DesignEnginner::find($request->design_enginner_id);

            if($design_enginner!=  null){
                DB::beginTransaction();
                $design=DesignRequest::findOrFail($design_enginner->design_id);
                $design_enginner->is_agreed=$request->status==1?1:0;
                $design_enginner->is_rejected=$request->status==0?1:0;
                $design_enginner->update();
              
              
              
                if($request->status==1){
                      
                    if($design_enginner->order ==1)
                   {
                    $next_design=DesignEnginner::where('design_id',$design_enginner->design_id)->where('order',$design_enginner->order +1)->first();
                    $next_design->is_active=1;
                    $next_design->update();
                    $data=[
                        'stage_id'=>$design_enginner->stage_id,
                        'estate_id'=>Auth::id()
                    ];
                    $this->_saveAcceptDesignRequestByEstateOwnerNotifications([$design_enginner->enginner_id],$data);
                     $data1=[
                         'office_id'=>$design->office_id,
                         'stage_id'=>$next_design->stage_id
                     ];
                    $this->_saveDesignRequestSendedToEmployeesNotifications($next_design->enginner_id,$data1);

                    
                   }

                  
                }
           
                else{
                    $design->status='rejected';
                    $design->update();
                    $data=[
                        'stage_id'=>$design_enginner->stage_id,
                        'estate_id'=>Auth::id()
                    ];
                    $this->_saveRejectDesignRequestByEstateOwnerNotifications([$design_enginner->enginner_id],$data);
                }

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


    
    protected function _saveAskDesignRequestOfferNotifications($members, $estate_id)
    {
        foreach ($members as $member){
            $notifiable_users = User::find($member);
            Notification::send($notifiable_users, new AskDesignRequestOffer($estate_id));
        }
    }
    protected function _saveAskSenderDesignRequestNotifications($request_id)
    {
      //  foreach ($members as $member){
     //       $notifiable_users = User::find($member);
            Notification::send(Auth::user(), new RequestSenderNotification($request_id));
     //   }
    }

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
            $notifiable_users = User::find($member);
            Notification::send($notifiable_users, new AcceptedRequestOfficeNotification($office_id));
    }


    protected function _saveAcceptDesignRequestByEstateOwnerNotifications($member,$data)
    {
            $notifiable_users = User::find($member);
            Notification::send($notifiable_users, new AcceptDesignRequestByEstateOwner($data));
    }
    protected function _saveRejectDesignRequestByEstateOwnerNotifications($member,$data)
    {
            $notifiable_users = User::find($member);
            Notification::send($notifiable_users, new RejectDesignRequestByEstateOwner($data));
    }

    protected function _saveDesignRequestSendedToEmployeesNotifications($member, $data)
    {
            $notifiable_users = User::find($member);
            Notification::send($notifiable_users, new DesignRequestSendedToEmployees($data));
     }
}
