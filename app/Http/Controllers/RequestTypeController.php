<?php

namespace App\Http\Controllers;
use App\Http\Util\CommonUtil;
use Illuminate\Http\Request;
use App\RequestType;
use App\SpecialtiyRequestProject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\ProjectMember;
use App\RequestEnginner;
use App\Components\User\Models\User;
use App\Notifications\ProjectCreatedNotification;
use App\Notifications\ProjectRequestCreatedNotification;
use App\Notifications\AcceptedRequestOfficeNotification;
use App\Notifications\RejectedRequestOfficeNotification;


use Notification;
use App\VisitRequest;
use App\DefaultEnginnersRequest;
use App\Http\Responses\Response;
use App\Notifications\RequestSenderNotification;
use App\SpecialtyVisitRequest;

class RequestTypeController extends Controller
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
            
              DB::beginTransaction();
              $status=$request->sent==0 ? 'new' : 'sent';
              $enginners=[];
              $i=0;
              if($request->sent== 1)
              {
                 $deafault_members=SpecialtiyRequestProject::where('project_id',$request->project_id)->get()->toArray();
               //  echo json_encode($deafault_members);
                 foreach($request->enginnering_type  as $item){
                    $results = array_filter($deafault_members, function($item1) use($item){
                        return ($item1['specialty_id'] === $item);
                     });
                     if ($results)
                     {
                         foreach($results as $item2){
                            $i=$i+1;
                            if(!in_array($item2['user_id'], $enginners)){
                                
                                array_push($enginners,$item2['user_id']);
                            }
                          
                         }
                       
                     }
                 }
               
                 if(count($request->enginnering_type)==$i){
                    $status='accepted';

                 }
             }
            //dd($request->all());
            $visit_request = VisitRequest::create([
                'customer_id'=>$customer_id,
                'project_id'=>$request->project_id,
                'location_id'=>$request->location_id,
                'request_type'=>'visit_request',//$request->request_type,
                'description'=> 'test',//$request->description,
                'status'=> $status,
               //  'office_status'=>$request->sent== 1? 'recieved' : '',
                'dead_line_date'=>$request->dead_line_date,
               // 'priority'=>$priority,
                'sent'=>$request->sent,
                //'office_id'=>$request->office_id,
                'note'=>$request->note,
                'created_at'=>Carbon::now()
            ]);
        
            $visit_request->offices()->attach($request->office_id, ['office_status' => 'recieved','request_type' => 'visit_request']);

            foreach($request->enginnering_type as $type)
            SpecialtyVisitRequest::create([
            'specialty_id' => $type,
            'rquest_id'=> $visit_request->id
           ]);
          //  $visit_request->specialties()->attach($request->enginnering_type);
            //if($status=='accepted'){
                foreach($enginners as $item){
                    DB::table('request_enginners')->insert([
                        'user_id'=>$item,
                        'request_id'=>$visit_request->id,
                        'request_type'=>'visit_request',
                        'is_show'=>1,
                    ]);


                    $data=[
                        'project_id'=>$visit_request->project_id,
                        'office_id'=>$visit_request->office_id ,//$visit_request->office_id,
                        'request_id'=>$visit_request->id,
                    ];
                   $this->_saveProjectRequestCreatedNotifications([$item],$data);
                }
             
            //}
      
            // if(isset($request->office_id)){
            //     if(!ProjectMember::where('project_id',$request->project_id)->where('user_id', $request->office_id)->first()){

            //     DB::table('project_members')->insert([
            //         'user_id'=>$request->office_id,
            //         'project_id'=>$request->project_id,
            //         'is_default'=>  0,
            //     ]);
            // }
            // }
            $this->_saveAskSenderDesignRequestNotifications(['request_id'=>$visit_request->id, 'estate_id'=> Auth::id(),'request_type'=>'visit request']);
           DB::commit();
            if($request->sent== 1)
            {
                
                $data=[
                    'project_id'=>$request->project_id,
                     'office_id'=>Auth::id(),
                     'request_id'=>0,
                ];
               $this->_saveProjectCreatedNotifications([$request->office_id], $data);
            }
              
            return $this->respondSuccess(__('messages.saved_successfully'));
            }

         catch (Exception $e) {
            $output = $this->respondWentWrong($e);
        }

    }

    protected function _saveAskSenderDesignRequestNotifications($request_id)
    {
      //  foreach ($members as $member){
     //       $notifiable_users = User::find($member);
            Notification::send(Auth::user(), new RequestSenderNotification($request_id));
     //   }
    }
  

    public function show($id)
    {
        // if (!request()->user()->can('tickets.edit')) {
        //     abort(403, 'Unauthorized action.');
        // }
        $request = VisitRequest::with('specialties','offices','location')->findOrFail($id);
        $enginnering_types=$this->CommonUtil->getEnginneringTypes();
        $request_types=$this->CommonUtil->getRequestsTypes();
        $data = [
                    'request' => $request,
                    'request_types' => $request_types,
                ];

        return $this->respondSuccess($data);
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



    public function update(Request $request, $id)
    {
        try{
            DB::beginTransaction();
            $visitRequest=VisitRequest::find($id);
           // $visitRequest->title=$request->title;
           
            $visitRequest->customer_id=$request->customer_id;
            $visitRequest->project_id=$request->project_id;
           // $visitRequest->request_type=$request->request_type;
          
          

            $visitRequest->note=$request->note;
            $visitRequest->dead_line_date=$request->dead_line_date;
         //   $visitRequest->enginnering_type=\json_encode($request->enginnering_type);
            
            if(isset($request->priority)){
                $visitRequest->priority=$request->priority;
            }
            if(isset($request->status)){
                $visitRequest->status=$request->status;
            }
            $visitRequest->specialties()->sync($request->enginnering_type);
            $visitRequest->save();
            $visitRequest->offices()->detach();
            $visitRequest->offices()->attach($request->office_id['id'], ['office_status' => 'recieved','request_type' => 'visit_request']);
            // if(!ProjectMember::where('project_id',$visitRequest->project_id)->where('user_id',$visitRequest->office_id)->first()){
            //     if(isset($request->office_id)){
            //         DB::table('project_members')->insert([
            //             'user_id'=>$visitRequest->office_id,
            //             'project_id'=>$visitRequest->project_id,
            //             'is_default'=>  0,
            //         ]);
            //     }
            // }
          
            DB::commit();
          return   $this->respondSuccess(__('messages.updated_successfully'));
           // $output = 
        }catch (Exception $e) {
            return $this->respondWentWrong($e);
        }

       // return $output;
        
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
                        'request_type'=>'visit_request',
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


    public function getRequestEnginners($requestId)
    {
        # code...
        $enginners=RequestEnginner::with('employee')->where('request_id',$requestId)->get()->toArray();
      /*  $users=[];
       
        foreach($enginners as $item){
            $user=User::find($item['user_id']);
            array_push($users,$user->name);
        }*/
        return $enginners;
    }
    public function getPriority(Request $request)
    {
        $priority = [
            [
                'key' => 'low',
                'value' => __('messages.low')
            ],
            [
                'key' => 'medium',
                'value' => __('messages.medium')
            ],
            [
                'key' => 'high',
                'value' => __('messages.high')
            ],
            [
                'key' => 'urgent',
                'value' => __('messages.urgent')
            ]
        ];
        return  $priority;
    }

    public function getRequestsTypes($append_all = false)
    {
        $requestTypes = [
            [
                'key' => 'visit_request',
                'value' => __('data.visit_request')
            ],
            [
                'key' => 'design_request',
                'value' => __('data.design_request')
            ],
            [
                'key' => 'support_service_request',
                'value' => __('data.support_service_request')
            ],
            [
                'key' => 'contractor_request',
                'value' => __('data.contractor_request')
            ],
            [
                'key' => 'supervision_request',
                'value' => __('data.supervision_request')
            ],
        ];
        return  $requestTypes;

    }



    public function getEnginneringTypes($append_all = false)
    {
        $enginneringTypes = [
            [
                'key' => 'civil_enginnering',
                'value' => __('data.civil_enginnering')
            ],
            [
                'key' => 'it_enginnering',
                'value' => __('data.it_enginnering')
            ],
            [
                'key' => 'architectural_enginnering',
                'value' => __('data.architectural_enginnering')
            ],
           
        ];
        return  $enginneringTypes;

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
    public function confirmSendRequest(Request $request)
    {
        
        if(isset($request['request_id'])){
            DB::beginTransaction();
          
            $visitRequest=VisitRequest::with('specialties')->findOrFail($request['request_id']);
            $enginners=[];
            if($visitRequest != null){
                $visitRequest->status='sent';
                $visitRequest->sent=1;
                $visitRequest->office_status='recieved';
///
                $i=0;
              $deafault_members=SpecialtiyRequestProject::where('project_id',$visitRequest->project_id)->get()->toArray();
            //  echo json_encode($deafault_members);
              foreach($visitRequest->specialties  as $item){
                        $results = array_filter($deafault_members, function($item1) use($item){
                            return ($item1['specialty_id'] === $item->id);
                        });
                        if ($results)
                        {
                            foreach($results as $item2){
                                $i=$i+1;
                                if(!in_array($item2['user_id'], $enginners)){
                                    
                                    array_push($enginners,$item2['user_id']);
                                }
                            
                            }
                            
                        }
            }

            if(count($visitRequest->specialties)===$i){
                $visitRequest->status='accepted';
               // $status='accepted';

            }


              


                $visitRequest->save();


                //if($visitRequest->status=='accepted'){
                    foreach($enginners as $item){
                        DB::table('request_enginners')->insert([
                            'user_id'=>$item,
                            'request_id'=>$visitRequest->id,
                            'request_type'=>'visit_request',
                            'is_show'=>1
                        ]);


                        $data=[
                            'project_id'=>$visitRequest->project_id,
                            'office_id'=>$visitRequest->office_id ,//$visit_request->office_id,
                            'request_id'=>$visitRequest->id,
                        ];
                       $this->_saveProjectRequestCreatedNotifications([$item],$data);
                    }
                 
                //}

              

                DB::commit();
                $data=[
                    'project_id'=>$visitRequest->project_id,
                     'office_id'=>Auth::id(),
                     'request_id'=>$visitRequest->id,
                ];
               $this->_saveProjectCreatedNotifications([$visitRequest->office_id], $data);
                return Response::respondSuccess(__('messages.updated_successfully'));
            }
        }
    }
    public function getRequests(Request $request){
        $project_id = request()->get('projectId', false);
        $user=User::find(request()->user()->id);
        if($user->hasRole('superadmin')){
         $requests =  VisitRequest::with('customer', 'project','specialties','offices','report','report.media','location')->where('request_type','visit_request');
         if (!empty($project_id)) {
            $requests =$requests->where('project_id',$project_id);
         }
         $requests=$requests->get()->toArray();
        }
        else{
         $childrens=$user->childrenIds($user->id);
         array_push($childrens,$user->id);
         $requests =  VisitRequest::with('customer', 'project','specialties','offices','report','report.media','location')->where('request_type','visit_request')
         ->whereIn('customer_id', $childrens);
         if (!empty($project_id)) {
            $requests =$requests->where('project_id',$project_id);
         }
         $requests=$requests->get()->toArray();
        }
 
     
         return $this->respond($requests);
    }
  
    public function getRequesStatus()
    {
        return $this->CommonUtil->getVisitRequestStatus();
      
    }
    
    protected function _saveProjectCreatedNotifications($members, $data)
    {
        foreach ($members as $member){
            $notifiable_users = User::find($member);
            Notification::send($notifiable_users, new ProjectRequestCreatedNotification($data));
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


    
    protected function _saveProjectRequestCreatedNotifications($member, $data)
    {
        //foreach ($members as $member){
            $notifiable_users = User::find($member);
            Notification::send($notifiable_users, new ProjectRequestCreatedNotification($data));
      //  }
    }


 
}
