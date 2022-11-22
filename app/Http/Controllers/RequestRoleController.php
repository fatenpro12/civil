<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\RequestRole;
use Notification;
use App\Http\Responses\Response;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Components\User\Models\User;
use App\Notifications\AskPermissionNotification;
use App\Notifications\AcceptedPermissionNotification;
use App\Notifications\RejectedPermissionNotification;


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
                            with('user','document','document.media')
                            ->orderBy($sort_by, $orderby)
                            ->paginate($rowsPerPage);

        return $this->respond($requests);

  
    }



    public function store(Request $request)
    {
       
    }


    public function acceptRequestRole($id){
        try {
            DB::beginTransaction();
            $requestRole = RequestRole::find($id);
             $requestRole->status='accepted';
            $requestRole->save();
            $role=Role::find($requestRole->role_id);
            $user=User::find($requestRole->user_id);

            $user->roles()->attach($role);

            DB::commit();
            //send notification
            $data = [
                'user_id' => Auth::id(),
                'permission_name' => $role->name,
                 ];
           $this->_saveAcceptedPermisssionNotifications($user->id,$data);
            
            $output = $this->respondSuccess();
        } catch (Exception $e) {
            DB::rollBack();
            $output = $this->respondWentWrong($e);
        }
        return $output;
    }


    public function rejectRequestRole($id){
        try {
            DB::beginTransaction();
            $requestRole = RequestRole::find($id);
             $requestRole->status='rejected';
            $requestRole->save();
            $role=Role::find($requestRole->role_id);
            DB::commit();
            //send notification
            $data = [
                'user_id' => Auth::id(),
                'permission_name' => $role->name,
                 ];
           $this->_saveRejectedPermisssionNotifications($requestRole->user_id,$data);
            $output = $this->respondSuccess();
        } catch (Exception $e) {
            DB::rollBack();
            $output = $this->respondWentWrong($e);
        }
        return $output;
    }


    protected function _saveAskedPermissionNotifications($member, $data)
    {
            $notifiable_users = User::find($member);
            Notification::send($notifiable_users, new AskPermissionNotification($data));
    }



    protected function _saveAcceptedPermisssionNotifications($member, $data)
    {
            $notifiable_users = User::find($member);
            Notification::send($notifiable_users, new AcceptedPermissionNotification($data));
    }

    protected function _saveRejectedPermisssionNotifications($member, $data)
    {
            $notifiable_users = User::find($member);
            Notification::send($notifiable_users, new RejectedPermissionNotification($data));
    }

    public function destroy($id)
    {
        try {
          
            $requestRole = RequestRole::find($id);
            $requestRole->delete();
           // $output = $this->respondSuccess();
            return Response::respondSuccess();
        } catch (Exception $e) {
           // $output = $this->respondWentWrong($e);
           return Response::respondError($e);
        }
      //  return $output;
    }


}
