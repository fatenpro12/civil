<?php

namespace App\Http\Controllers;
use App\Http\Util\CommonUtil;
use Illuminate\Http\Request;
use App\RequestType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\ProjectMember;
use App\DesignRequest;
use App\RequestEnginner;
use App\Components\User\Models\User;
use App\Notifications\ProjectCreatedNotification;
use App\Notifications\AcceptedRequestOfficeNotification;
use App\Notifications\RejectedRequestOfficeNotification;
use Notification;
use App\Http\Controllers\Controller;
use App\VisitRequest;
use App\DefaultEnginnersRequest;
use Lang;
use App\DesignEnginner;
use App\Http\Responses\Response;
use App\Notifications\AskContractorRequestOffer;
use App\Notifications\AskDesignRequestOffer;
use App\Notifications\AskSupportServiceRequestOffer;

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
        $requests = DesignRequest::with('stages','customer','project','office')->whereIn('customer_id', $childrens);
       

        $requests = $requests->orderBy($sort_by, $orderby)
                    ->paginate($rowsPerPage);

       return $this->respondSuccess($requests);
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
            DB::beginTransaction();
            $input = $request->all();
            $input['created_at']=Carbon::now();
            $input['created_by'] = Auth::id();
            $input['status']= $request->sent==0 ? 'new' : 'sent';
            $request = DesignRequest::create($input);
            DB::commit();

            /*if($request->sent== 1){
                 $this->_saveProjectCreatedNotifications([$request->office_id], $request->project_id);
                 
            }*/
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
            $design = DesignRequest::find($id);
            if($design!=  null){
                DB::beginTransaction();
                $input = $request->all();
                $design->update($input);
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
        $request = DesignRequest::with('stages','customer','project','office')->findOrFail($id);
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



    protected function _saveAskSupportServiceRequestOfferNotifications($members, $estate_id)
    {
        foreach ($members[0] as $member){
         //   dd($member);
            $notifiable_users = User::find($member->id);
            Notification::send($notifiable_users, new AskSupportServiceRequestOffer($estate_id));
        }
    }
    protected function _saveAskContractorRequestOfferNotifications($members, $estate_id)
    {
        dd($members);
        foreach ($members as $member){
            $notifiable_users = User::find($member->id);
            Notification::send($notifiable_users, new AskContractorRequestOffer($estate_id));
        }
    }
    protected function _saveAskDesignRequestOfferNotifications($members, $estate_id)
    {
        foreach ($members[0] as $member){
            $notifiable_users = User::find($member->id);
            Notification::send($notifiable_users, new AskDesignRequestOffer($estate_id));
        }
    }
    

    public function confirmDesign(Request $request)
    {

        try {
            $design = DesignRequest::with('offices')->find($request->design_id);
            if($design!=  null){
                DB::beginTransaction();
                $design->status='sent';
                $design->sent=1;
                $design->update();
                //dd(  $design->offices);
                if($design->request_type == 'design_request')
                $this->_saveAskDesignRequestOfferNotifications([$design->offices], Auth::id());
                if($design->request_type == 'support_service_request')
                $this->_saveAskSupportServiceRequestOfferNotifications([$design->offices], Auth::id());
                if($design->request_type == 'contractor_request')
                $this->_saveAskContractorRequestOfferNotifications([$design->offices], Auth::id());
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





    public function showDesignRequestDetails(Request $request)
    {

        try {
            $design_enginner=[];
            $design_enginner = DesignEnginner::with('stage','enginner')->findOrFail($request->id);
            if($design_enginner!=  null){
               // $design=DesignRequest::findOrFail($design_enginner->design_id);
                $temp=DesignEnginner::where('design_id',$design_enginner->design_id)->where('order',1)->first();
                $design_enginner['is_agreed1']=$temp->is_agreed ;
                $design_enginner['is_rejected1']=$temp->is_rejected ;
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


 
}
