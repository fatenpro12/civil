<?php

namespace App\Http\Controllers\EstateOwner;
use App\Http\Util\CommonUtil;
use Illuminate\Http\Request;
use App\RequestType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\ProjectMember;
use App\RequestEnginner;
use App\Components\User\Models\User;
use App\Notifications\ProjectCreatedNotification;
use App\Notifications\AcceptedRequestOfficeNotification;
use App\Notifications\RejectedRequestOfficeNotification;
use Notification;
use App\Http\Controllers\Controller;
use App\VisitRequest;
use App\DefaultEnginnersRequest;
use App\Http\Responses\Response;
class RequestTypeController extends  Controller
{
    protected $commonUtil;

    public function __construct(CommonUtil $commonUtil)
    {
        $this->CommonUtil = $commonUtil;
    }


    public function index(Request $request)
    {

        $types=RequestType::select('id', 'name')
                        ->get()
                        ->toArray();
                return $types;
    }

    
    public function store(Request $request)
    {
        try {
            if($request->customer_id==null){
                $user_id=Auth::id();
        }else{
                $user_id=$request->customer_id;
            }
            $customer_id=$user_id;//User::find($user_id)->customer_id;
            
            // if($request->priority==null){
            //     $priority='medium';
               
            // }else{
            //     $priority=$request->priority;
            // }
    
           $user = $request->user();
    
            // if(!$user->hasRole('superadmin')){
                // $status=config('enums.visit_request_status.new');
            // }
            // else{
            //     $status=config('enums.visit_request_status.accepted');
            // }
    
    //        $projects = Project::with('customer', 'categories', 'members', 'members.media');
            
              DB::beginTransaction();
            DB::table('visit_requests')->insert([
                'customer_id'=>$customer_id,
                'project_id'=>$request->project_id,
                'request_type'=> $request->request_type,
                'description'=> $request->description,
                'status'=> $request->sent==0 ? 'new' : 'sent',
                'office_status'=>$request->sent== 1? 'recieved' : '',
                'dead_line_date'=>$request->dead_line_date,
                'sent'=>$request->sent,
                'office_id'=>$request->office_id,
                'note'=>$request->note,
                ///'enginnering_type'=>json_encode($request->enginnering_type),
                //'created_at'=>Carbon::now()
            ]);

            
            // if(isset($request->office_id)){
            //     if(!ProjectMember::where('project_id',$request->project_id)->where('user_id', $request->office_id)->first()){

            //     DB::table('project_members')->insert([
            //         'user_id'=>$request->office_id,
            //         'project_id'=>$request->project_id,
            //         'is_default'=>  0,
            //     ]);
            // }
            // }
            DB::commit();
            if($request->sent== 1)
               $this->_saveProjectCreatedNotifications([$request->office_id], $request->project_id);
            return $this->respondSuccess(__('messages.saved_successfully'));
            }

         catch (Exception $e) {
            $output = $this->respondWentWrong($e);
        }

    }


  

    public function show($id)
    {
        if (!request()->user()->can('tickets.edit')) {
            abort(403, 'Unauthorized action.');
        }
        $request = VisitRequest::with('request_enginners')->findOrFail($id);
        $enginnering_types=$this->CommonUtil->getEnginneringTypes();
        $request_types=$this->CommonUtil->getRequestsTypes();
        $data = [
                    'request' => $request,
                    'enginnering_types' => $enginnering_types,
                    'request_types' => $request_types,
                ];

        return $this->respond($data);
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
            if(VisitRequest::find($id)){
                VisitRequest::destroy($id);
            }else{
                ProjectRequest::destroy($id);
            }
            $output = $this->respondSuccess(__('messages.deleted_successfully'));
        }catch(\Exception $e){
            $output = $this->respondWentWrong($e);
        }
        return $output;
    }



   
    public function acceptProject(Request $request)
    {
        $lang = $request->header('lang');
        if (!isset($lang)) {
            $lang = "en";
        }   
          if ($lang == "ar") {
            if (!isset($request->enginners) ||!isset($request->default_enginners)  ) {
                return Response::respondError('حقل وقت المهندس مطلوب ');
            }
    

            }
            if ($lang == "en") {
                if (!isset($request->enginners) || !isset($request->default_enginners) ) {
                    return Response::respondError('The field "Enginner" is required ');
                }
             
            }
            try{
                DB::beginTransaction();
            $visit_request=VisitRequest::find($request->id);
        $visit_request->status="accepted";
        $visit_request->office_status='accepted';
        if(isset($request->dead_line_date)){
            $visit_request->dead_line_date=$request->dead_line_date;
        }
       $visit_request->save();
       $this->_saveAcceptedRequestNotifications($visit_request->customer_id,$visit_request->office_id);


        if(!ProjectMember::where('project_id',$visit_request->project_id)->where('user_id',$visit_request->office_id)->first()){
            if(isset($visit_request->office_id)){
                DB::table('project_members')->insert([
                    'user_id'=>$visit_request->office_id,
                    'project_id'=>$visit_request->project_id,
                    'is_default'=>  0,
                ]);
            }
        }

        if(isset($request->default_enginners)){
            foreach ($request->default_enginners as $item ) {
                if(!empty($item['enginner_id'])){
                    if(!ProjectMember::where('project_id',$visit_request->project_id)->where('user_id', $item['enginner_id'])->first()){
                    DB::table('project_members')->insert([
                        'user_id'=>$item['enginner_id'],
                        'project_id'=>$visit_request->project_id,
                        'is_default'=> isset($item['is_default']) ? $item['is_default'] : 0,
                    ]);
                }
                if(!RequestEnginner::where('request_id',$visit_request->id)->where('user_id', $item['enginner_id'])->first()){
                    DB::table('request_enginners')->insert([
                        'user_id'=>$item['enginner_id'],
                        'request_id'=>$visit_request->id,
                    ]);
                }
            }
            }
        }
        if(isset($request->enginners)){
                foreach ($request->enginners as $item ) {
                    if(!ProjectMember::where('project_id',$visit_request->project_id)->where('user_id', $item)->first()){
                            DB::table('project_members')->insert([
                                'user_id'=>$item,
                                'project_id'=>$visit_request->project_id,
                                'id_default'=>  0,
                            ]);
                   }
               
            }
           
        }

        
    
    DB::commit();
        return Response::respondSuccess(__('messages.updated_successfully'));
       // return $this->respondSuccess();
        }

        catch (Exception $e) {
            $output = $this->respondWentWrong($e);
           return Response::respondError($e);
         }
         ;
       
    }



   
    public function cancelRequest(Request $request)
    {
        if(isset($request['request_id'])){
            $visitRequest=VisitRequest::find($request['request_id']);
            if($visitRequest != null){
                $visitRequest->status='rejected';
                $visitRequest->office_status='rejected';
                $visitRequest->sent=1;
                //$visitRequest->office_status='recieved';
                $visitRequest->save();
                $this->_saveRejectedRequestNotifications($visitRequest->customer_id,$visitRequest->office_id);
                return Response::respondSuccess(__('messages.updated_successfully'));
            }
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
