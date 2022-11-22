<?php

namespace App\Http\Controllers;

use App\Components\User\Models\User;
use App\Customer;
use App\Leave;
use App\Project;
use App\ProjectTask;
use App\Reminder;
use App\DesignRequest;
use App\Ticket;
use App\DesignEnginner;
use App\StageProject;
use Auth;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = request()->user();
        if(Auth::user()->user_type_log == 'ESTATE_OWNER')
        $notifications_count = $user->unreadNotifications
        ->where('type','!=','App\\Notifications\\AskDesignRequestOffer')
        ->where('type','!=','App\Notifications\ProjectRequestCreatedNotification')
        ->count(); 
        else
        $notifications_count = $user->unreadNotifications->count();
        return $this->respond($notifications_count);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
    }

    /**
     * Mark the notifications
     * as read.
     *
     * @param  \Illuminate\Http\Response
     *
     * @return \Illuminate\Http\Response
     */
    public function markAsRead()
    {
        $user = request()->user();
        $notifications = $user->notifications()
                            ->orderBy('created_at', 'desc')
                            ->simplePaginate();

        $user->notifications()
                ->orderBy('created_at', 'desc')
                ->simplePaginate()->markAsRead();
           //    dd($notifications);
        foreach ($notifications as $notification) {
            if ('App\Notifications\AskDesignRequestOffer' == $notification->type) {
                $notification['estate'] = User::
                            findOrFail($notification->data['estate_id']);
            }
            if ('App\Notifications\RequestSenderNotification' == $notification->type) {
                $notification['estate'] = User::
                            findOrFail($notification->data['estate_id']);
               $notification['request_id'] =$notification->data['request_id'];
           //    dd($notification->data);
               $notification['request_type'] =$notification->data['request_type'];
            }
         
            if ('App\Notifications\AskSupportServiceRequestOffer' == $notification->type) {
                $notification['estate'] = User::
                            findOrFail($notification->data['estate_id']);
      
            }
                     
            if ('App\Notifications\AskContractorRequestOffer' == $notification->type) {
                $notification['estate'] = User::
                            findOrFail($notification->data['estate_id']);
      
            }
            if ('App\Notifications\AcceptProjectFromOwner' == $notification->type) {
                $notification['estate'] = User::
                            findOrFail($notification->data['owner']);
                            $notification['project'] = Project::with('creator')
                            ->findOrFail($notification->data['project']);
      
            }
            if ('App\Notifications\RejectProjectFromOwner' == $notification->type) {
                $notification['estate'] = User::
                            findOrFail($notification->data['owner']);
                            $notification['project'] = Project::with('creator')
                            ->findOrFail($notification->data['project']);
      
            }
            if ('App\Notifications\AcceptDesignRequestByEstateOwner' == $notification->type) {
                $notification['estate'] = User::
                            findOrFail($notification->data['estate_id']);
                $notification['stage'] = StageProject::
                            findOrFail($notification->data['stage_id']);
                                
            }
           
            if ('App\Notifications\RejectDesignRequestByEstateOwner' == $notification->type) {
                $notification['estate'] = User::
                            findOrFail($notification->data['estate_id']);
                $notification['stage'] = StageProject::
                             findOrFail($notification->data['stage_id']);
            }

            ////////////////////////////
            if ('App\Notifications\AcceptContractorRequestByEstateOwner' == $notification->type) {
                $notification['estate'] = User::
                            findOrFail($notification->data['estate_id']);     
            }
           
            if ('App\Notifications\RejectContractorRequestByEstateOwner' == $notification->type) {
                $notification['estate'] = User::
                            findOrFail($notification->data['estate_id']);
            }

            if ('App\Notifications\AcceptSupportServiceOfficeRequestByEstateOwner' == $notification->type) {
                $notification['estate'] = User::
                            findOrFail($notification->data['estate_id']);     
            }
           
            if ('App\Notifications\RejectSupportServiceOfficeRequestByEstateOwner' == $notification->type) {
                $notification['estate'] = User::
                            findOrFail($notification->data['estate_id']);
            }
            ///////////////////////////
      

            if ('App\Notifications\DesignRequestSendedToEmployees' == $notification->type) {
                $notification['office'] = User::
                            findOrFail($notification->data['office_id']);
                            $notification['stage'] = StageProject::
                                findOrFail($notification->data['stage_id']);
            }
            if ('App\Notifications\DesignRequestEngineerRejected' == $notification->type) {
                $notification['office'] = User::findOrFail($notification->data['office_id']);
            }
            if ('App\Notifications\ShowDesignRequestOffer' == $notification->type) {
                $notification['enginner'] = User::
                            findOrFail($notification->data['enginner_id']);
                $notification['project'] = Project::with('creator')
                                ->findOrFail($notification->data['project_id']);
               
               $notification['design_enginner'] = DesignEnginner::
                                findOrFail($notification->data['design_enginner_id']);
                $notification['stage'] = StageProject::
                                    findOrFail($notification->data['stage_id']);
                                
            }

            if ('App\Notifications\ProjectCreatedNotification' == $notification->type) {
              //  dd($notification->data['project_id']);
                if(Project::find($notification->data['project_id']))
                $notification['project'] = Project::with('creator')->findOrFail($notification->data['project_id']);
               
            }
            if ('App\Notifications\ProjectEditedNotification' == $notification->type) {
                if(Project::find($notification->data['project_id']))
                $notification['project'] = Project::with('creator')
                            ->findOrFail($notification->data['project_id']);
                  $notification['user'] = User::findOrFail($notification->data['user_id']);
                            
            }
            
            if ('App\Notifications\ProjectRequestCreatedNotification' == $notification->type) {
                $notification['project'] = Project::with('creator')
                            ->findOrFail($notification->data['project_id']);
                   $notification['office'] = User::findOrFail($notification->data['office_id']);
            }
            
            elseif ('App\Notifications\AcceptedRequestOfficeNotification' == $notification->type) {
                $notification['office'] = User::findOrFail($notification->data['office_id']);
            } 

            elseif ('App\Notifications\RejectedRequestOfficeNotification' == $notification->type) {
                $notification['office'] = User::findOrFail($notification->data['office_id']);
            } 
            if ('App\Notifications\AcceptRequestSendedFromContractor' == $notification->type) {
                $notification['office'] = User::findOrFail($notification->data['office_id']);
            }
           
            if ('App\Notifications\AcceptRequestSendedFromSupportServiceOffice' == $notification->type) {
                $notification['office'] = User::findOrFail($notification->data['office_id']);
            }

            elseif ('App\Notifications\AskPermissionNotification' == $notification->type) {
                $notification['user'] = User::findOrFail($notification->data['user_id']);
                $notification['user_admin'] = User::findOrFail($notification->notifiable_id);
            } 
            elseif ('App\Notifications\AcceptedPermissionNotification' == $notification->type) {
                $notification['user'] = User::findOrFail($notification->data['user_id']);
                $notification['requester'] = User::findOrFail($notification->notifiable_id);
            } 
            elseif ('App\Notifications\RejectedPermissionNotification' == $notification->type) {
                $notification['user'] = User::findOrFail($notification->data['user_id']);
                $notification['requester'] = User::findOrFail($notification->notifiable_id);
            } 
             elseif ('App\Notifications\TaskCreatedNotification' == $notification->type) {
                $notification['task'] = ProjectTask::with('taskCreator', 'project')
                                ->findOrFail($notification->data['task_id']);
            } 
            elseif ('App\Notifications\LeaveApplied' == $notification->type) {
                $notification['applicant'] = User::findOrFail($notification->data['user_id']);
                $notification['leave'] = Leave::findOrFail($notification->data['leave_id']);
            } elseif ('App\Notifications\LeaveResponded' == $notification->type) {
                $notification['leave_answered'] = Leave::findOrFail($notification->data['leave_id']);
                $notification['answered_by'] = User::findOrFail($notification->data['admin']);
            } elseif ('App\Notifications\SendReminderNotification' == $notification->type) {
                $notification['reminder'] = Reminder::findOrFail($notification->data['reminder_id']);
                $notification['remind_to'] = User::findOrFail($notification->data['user_id']);
                $notification['lead'] = Customer::findOrFail($notification->data['lead_id']);
            } elseif ('App\Notifications\TicketCreated' == $notification->type) {
                $notification['ticket'] = Ticket::findOrFail($notification->data['ticket_id']);
                $notification['created_by'] = User::findOrFail($notification->data['created_by']);
            }
        }
        
        return $this->respond($notifications);
    }
}
