<?php

namespace App\Http\Controllers\EnginneringOffice;

use App\Http\Util\CommonUtil;
use Illuminate\Http\Request;
use App\RequestType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\ProjectMember;
use App\Project;
use App\SpecialtiyRequestProject;
use App\RequestEnginner;
use App\Components\User\Models\User;
use App\Notifications\ProjectCreatedNotification;
use App\Notifications\AcceptedRequestOfficeNotification;
use App\Notifications\RejectedRequestOfficeNotification;
use App\Notifications\ProjectRequestCreatedNotification;

use Notification;
use App\Http\Controllers\Controller;
use App\VisitRequest;
use App\DefaultEnginnersRequest;
use App\Http\Responses\Response;
use App\Notifications\RequestSenderNotification;
use App\SpecialtyVisitRequest;

class RequestTypeController extends  Controller
{
    protected $commonUtil;

    public function __construct(CommonUtil $commonUtil)
    {
        $this->CommonUtil = $commonUtil;
    }


    public function index(Request $request)
    {

        $types = RequestType::select('id', 'name')
            ->get()
            ->toArray();
        return $types;
    }

    public function getOfficeRequests(Request $request)
    {
        $project_id = request()->get('projectId', false);

        $user = User::find(request()->user()->id);
        $requests = [];

        //if (!$user->is_emp ) 
        if($user->hasRole('Engineering Office Manager')){
            $requests =  VisitRequest::with('customer', 'project', 'specialties', 'offices','report','report.media')->where('request_type', 'visit_request')
                ->whereHas('offices', function ($q) use ($user) {
                    $q->where('office_id', $user->id); //->orWhere('office_id', $user->parent_id);
                })
                ->WhereIn('status', ['sent', 'rejected', 'accepted']);
            if (!empty($project_id)) {
                $requests = $requests->where('project_id', $project_id);
            }

            $requests = $requests->get()
                ->toArray();
        } else if ($user->is_emp ) {
            $id = $user->id;
            $requests = VisitRequest::with('customer', 'project', 'specialties', 'requestEnginners', 'offices','report','report.media')->where('request_type', 'visit_request')
            ->whereHas('requestEnginners', function ($q) use ($id) {
                $q->where('user_id', $id);
            });
            if (!empty($project_id)) {
                $requests = $requests->where('project_id', $project_id);
            }

            $requests = $requests->get()
                ->toArray();



            // $enginners=RequestEnginner::where('request_type','visit_request')->where('user_id',request()->user()->id)->get()->toArray();
            /*   foreach($requests as $item){
              $request=VisitRequest::with('customer', 'project','specialties')->find($item['request_id']);
              $request['is_cheaked']=$item['is_cheaked'];
              $request['is_show']=$item['is_show'];
              
               array_push($requests, $request);
            }*/
        }

        return $this->respond($requests);
    }




    public function store(Request $request)
    {
        try {
            if ($request->customer_id == null) {
                $user_id = Auth::id();
            } else {
                $user_id = $request->customer_id;
            }
            $customer_id = $user_id; //User::find($user_id)->customer_id;

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
            // echo \json_encode($request->enginnering_type);
            //die();
            DB::beginTransaction();


            $visitRequest = VisitRequest::create([
                //'title'=>$request->title,
                'customer_id' => $customer_id,
                'project_id' => $request->project_id,
                'request_type' => 'visit_request', //$request->request_type,
                'description' => 'test', //$request->description,
                'status' => $request->sent == 0 ? 'new' : 'sent',
                'office_status' => $request->sent == 1 ? 'recieved' : '',
                'dead_line_date' => $request->dead_line_date,
                // 'priority'=>$priority,
                'sent' => $request->sent,
               // 'office_id' => $request->office_id,
                'note' => $request->note,
          //      'enginnering_type' => json_encode($request->enginnering_type),
                'created_at' => Carbon::now()
            ]);

            $visitRequest->offices()->attach($request->office_id, ['office_status' => 'recieved','request_type' => 'visit_request']);

            $this->_saveAskSenderDesignRequestNotifications(['request_id'=>$visitRequest->id, 'estate_id'=> Auth::id(),'request_type'=>'visit request']);
            foreach($request->enginnering_type as $type)
            SpecialtyVisitRequest::create([
            'specialty_id' => $type,
            'rquest_id'=> $visitRequest->id
           ]);

          //  $visitRequest->specialties()->sync($request->enginnering_type);
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
            if ($request->sent == 1)
                $this->_saveProjectCreatedNotifications([$request->office_id], $request->project_id);
            return $this->respondSuccess(__('messages.saved_successfully'));
        } catch (Exception $e) {
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


    public function show($id, Request $request)
    {

        $request = VisitRequest::with('specialties')->findOrFail($id);
        $enginnering_types = $this->CommonUtil->getEnginneringTypes();
        $request_types = $this->CommonUtil->getRequestsTypes();
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
        try {
            if (VisitRequest::find($id)) {
                VisitRequest::destroy($id);
            } else {
                ProjectRequest::destroy($id);
            }
            $output = $this->respondSuccess(__('messages.deleted_successfully'));
        } catch (\Exception $e) {
            $output = $this->respondWentWrong($e);
        }
        return $output;
    }

    public function acceptRequestByEnginner(Request $request)
    {
        $lang = $request->header('lang');
        if (!isset($lang)) {
            $lang = "ar";
        }
        if ($lang == "ar") {
            if (!isset($request->dead_line_date)) {
                return Response::respondError('حقل وقت المهندس مطلوب ');
            }
        }
        if ($lang == "en") {
            if (!isset($request->dead_line_date)) {
                return Response::respondError('The field "Enginner" is required ');
            }
        }
        try {
            DB::beginTransaction();
            $request_enginner = RequestEnginner::where('request_id', $request->request_id)->where('request_type', 'visit_request')->where('user_id', Auth::id())->first();
            $request_enginner->is_cheaked = 1;
            $request_enginner->dead_line_date = $request->dead_line_date;

            $request_enginner->save();
            $visit_request =VisitRequest::find($request->request_id);
             $this->_saveAcceptedRequestNotifications($visit_request->customer_id,Auth::id());


            DB::commit();
            return Response::respondSuccess(__('messages.updated_successfully'));
            // return $this->respondSuccess();
        } catch (Exception $e) {
            $output = $this->respondWentWrong($e);
            return Response::respondError($e);
        };
    }

    public function getEmployeesOfficeForRequest(Request $request)
    {

        $specialties = [];
        $specialties_tmp = [];
        if (isset($request->request_id)) {
            $vist_request  = VisitRequest::with('specialties', 'offices')->where('id', $request->request_id)->first();

            $deafault_members = SpecialtiyRequestProject::where('project_id', $vist_request->project_id)->get()->toArray();

            $specialties = $vist_request->specialties;
            //dd($specialties);
            foreach ($specialties as $item) {
                $results = array_filter($deafault_members, function ($item1) use ($item) {
                    return ($item1['specialty_id'] === $item->id);
                });
                if (!$results) {
                    array_push($specialties_tmp, $item);
                }
            }
            foreach ($specialties_tmp as $item) {
               
                $item['employees'] = User::getUsersOfficeForSpecialty(Auth::id(), $item->id);
            }
        }

        return $specialties_tmp;

    }

    public function acceptProject(Request $request)
    {
        $lang = $request->header('lang');
        if (!isset($lang)) {
            $lang = "en";
        }
        if ($lang == "ar") {
            if (!isset($request->enginners) || !isset($request->default_enginners)) {
                return Response::respondError('حقل وقت المهندس مطلوب ');
            }
        }
        if ($lang == "en") {
            if (!isset($request->enginners) || !isset($request->default_enginners)) {
                return Response::respondError('The field "Enginner" is required ');
            }
        }
        try {
            DB::beginTransaction();
            $visit_request = VisitRequest::find($request->id);
            $visit_request->status = "accepted";
            $office = $visit_request->offices->find(Auth::id());
            // $design->offices()->save($office, ['office_status' => 'pending']);
             $office->pivot->office_status = 'accepted';
             $office->pivot->update();
            if (isset($request->dead_line_date)) {
                $visit_request->dead_line_date = $request->dead_line_date;
            }
            $visit_request->save();
            $this->_saveAcceptedRequestNotifications($visit_request->customer_id, Auth::id());


            if (!ProjectMember::where('project_id', $visit_request->project_id)->where('user_id', Auth::id())->first()) {
                if (isset($visit_request->office_id)) {
                    DB::table('project_members')->insert([
                        'user_id' => $visit_request->office_id,
                        'project_id' => $visit_request->project_id,
                        'is_default' =>  0,
                    ]);
                }
            }
            if (isset($request->default_enginners)) {
                foreach ($request->default_enginners as $item) {
                    if (!empty($item['enginner_id'])) {

                        if (!ProjectMember::where('project_id', $visit_request->project_id)->where('user_id', $item['enginner_id'])->first()) {
                            DB::table('project_members')->insert([
                                'user_id' => $item['enginner_id'],
                                'project_id' => $visit_request->project_id,
                                'is_default' => isset($item['isDefault']) ? $item['isDefault'] : 0,
                            ]);
                        }


                        if (isset($item['isDefault'])) {
                            if ($item['isDefault'] == true) {
                                DB::table('specialtiy_request_project')->insert([
                                    'user_id' => $item['enginner_id'],
                                    'project_id' => $visit_request->project_id,
                                    'specialty_id' => $item['specialty_id'],
                                    'request_id' => $visit_request->id,
                                    //'is_default'=> isset($item['isDefault']) ? $item['isDefault'] : 0,
                                ]);
                            }
                        }
                  
                        if (!RequestEnginner::where('request_id', $visit_request->id)->where('request_type', 'visit_request')->where('user_id', $item['enginner_id'])->first()) {
                            DB::table('request_enginners')->insert([
                                'user_id' => $item['enginner_id'],
                                'request_id' => $visit_request->id,
                                'request_type' => 'visit_request',
                            ]);
                        }
                        $data = [
                            'project_id' => $visit_request->project_id,
                            'office_id' => Auth::id(),
                            'request_id' => $visit_request->id,
                        ];
                        $this->_saveProjectRequestCreatedNotifications([$item['enginner_id']], $data);
                    }
                }
            }


            if (isset($request->enginners)) {
                foreach ($request->enginners as $item) {
                    if (!ProjectMember::where('project_id', $visit_request->project_id)->where('user_id', $item)->first()) {
                        DB::table('project_members')->insert([
                            'user_id' => $item,
                            'project_id' => $visit_request->project_id,
                            'id_default' =>  0,
                        ]);
                    }
                }
            }
            DB::commit();
            DB::beginTransaction();
            $all_visit_requests = VisitRequest::with('specialties')->where('project_id', $visit_request->project_id)->where('status', 'sent')->get()->toArray();
            if (count($all_visit_requests) > 0) {
                $deafault_members = SpecialtiyRequestProject::where('project_id', $visit_request->project_id)->get()->toArray();

                foreach ($all_visit_requests as $item_request) {
                    $i = 0;
                    $enginners = [];
                    foreach ($item_request['specialties']  as $item) {


                        $results = array_filter($deafault_members, function ($item1) use ($item) {
                            return ($item1['specialty_id'] === $item['id']);
                        });
                        if ($results) {
                            $i = $i + 1;
                            foreach ($results as $item2) {
                                array_push($enginners, $item2['user_id']);
                            }
                        }
                    }
                    foreach ($enginners as $item) {
                        DB::table('request_enginners')->insert([
                            'user_id' => $item,
                            'request_id' => $item_request['id'],
                            'request_type' => 'visit_request',
                            'is_show' => 1,
                        ]);

                        $data = [
                            'project_id' => $item_request['project_id'],
                            'office_id' => $item_request['office_id'], //$visit_request->office_id,
                            'request_id' => $item_request['id'],
                        ];
                        $this->_saveProjectRequestCreatedNotifications([$item], $data);
                    }
                    $enginners = [];
                    if (count($item_request['specialties']) == $i) {
                        $tmp = VisitRequest::find($item_request['id']);
                        $tmp->status = 'accepted';
                        $tmp->update();
                        $this->_saveAcceptedRequestNotifications($tmp->customer_id, Auth::id());
                    }
                }

                DB::commit();
            }




            return Response::respondSuccess(__('messages.updated_successfully'));
            // return $this->respondSuccess();
        } catch (Exception $e) {
            $output = $this->respondWentWrong($e);
            return Response::respondError($e);
        };
    }
    public function cancelRequest(Request $request)
    {
        if (isset($request['request_id'])) {
            $visitRequest = VisitRequest::find($request['request_id']);
            if ($visitRequest != null) {
                $visitRequest->status = 'rejected';
                $visitRequest->office_status = 'rejected';
                $visitRequest->sent = 1;
                //$visitRequest->office_status='recieved';
                $visitRequest->save();
                $this->_saveRejectedRequestNotifications($visitRequest->customer_id, $visitRequest->office_id);
                return Response::respondSuccess(__('messages.updated_successfully'));
            }
        }
    }


    public function getProjectRequests(Request $request)
    {
        //         $user=User::find(request()->user()->id);
        //         $childrens=$user->childrenIds($user->id);
        //        array_push($childrens,$user->id);
        //       if (!$user->hasRole('superadmin')) { 
        //       $projects=Project::select('id', 'name')
        //                       ->whereIn('customer_id',$childrens)
        //                       ->get()
        //                       ->toArray();
        // //      $projectRequest=ProjectRequest::select('id', 'name')
        //   //                                   ->where('customer_id',$user->customer_id)
        //     //                                 ->get()
        //       //                               ->toArray();
        //       }else{
        //           $projects=Project::select('id', 'name')
        //                       ->get()
        //                       ->toArray();
        //  //         $projectRequest=ProjectRequest::select('id', 'name')
        //    //                   ->get()
        //      //                 ->toArray();
        //       }
        //   //    return array_merge($projects,$projectRequest);

        //               // $projects=Project::select('id', 'name')
        //               // ->get()
        //               // ->toArray();
        $user = $request->user();
        $projects = Project::select('id', 'name');
        $childrens=$user->childrenIds($user->id);
        array_push($childrens,$user->id);
            $projects = $projects->whereHas('members', function ($q) use ($childrens) {
                $q->WhereIn('user_id', $childrens);
            })->orWhere('customer_id', $user->id);
        $projects = $projects
            ->get()
            ->toArray();
        return $projects;
    }

    protected function _saveProjectCreatedNotifications($members, $project_id)
    {
        foreach ($members as $member) {
            $notifiable_users = User::find($member);
            Notification::send($notifiable_users, new ProjectCreatedNotification($project_id));
        }
    }
    protected function _saveProjectRequestCreatedNotifications($member, $data)
    {
        //foreach ($members as $member){
        $notifiable_users = User::find($member);
        Notification::send($notifiable_users, new ProjectRequestCreatedNotification($data));
        //  }
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
