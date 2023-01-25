<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\RequestRole;
use Notification;
use App\Http\Responses\Response;
use App\Document;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Notifications\AskPermissionNotification;
use App\Components\User\Models\User;
use App\DesignRequest;
use App\Notifications\RequestSenderNotification;
use Carbon\Carbon;
use App\Project;
use App\StageProject;
use App\SupportRequestUsers;
use App\VisitRequest;
use File;
use Illuminate\Support\Facades\Config;
use Lang;
use Illuminate\Support\Facades\Storage;

class CommonController extends Controller
{
    //
    public function getGenders()
    {
      
        $gender_types = User::getGenders();
        
        return $this->respond(['gender_types' => $gender_types]);
    }
    public function getLanguages(){
       return Config::get('languages');
    }
    
    public function askPermissionForUser(Request $request)
    {
         try {
            DB::beginTransaction();

                $document =Document::create([
                    'user_id'=>Auth::id(),
                    'type'=>'request_role',
                    'commercial_register'=>$request->commercial_register,
                    'created_at'=>Carbon::now()
                ]);
                if($request->hasFile('file'))
                $document->addMedia($request->file)->toMediaCollection('document');
          //  }

            $role_id = $request->input('permission');
            $note=$request->input('note');
            $role = Role::find($role_id);
            DB::table('request_roles')->insert([
                'role_id' => $role_id,
                'user_id'=>Auth::id(),
                'path_document'=>$document->id,//$path_document,
                'note'=>$note,
                'status'=>'pending',
                'created_at'=>Carbon::now()
            ]);
            $this->_saveAskSenderDesignRequestNotifications(['request_id'=>$document->id, 'estate_id'=> Auth::id(),'request_type'=>'role request']);
            DB::commit();
          
            $data = [
            'user_id' => Auth::id(),
            'permission_name' => $role->name,
             ];
           $this->_saveAskedPermissionNotifications(1,$data);
           return Response::respondSuccess();

        } catch (Exception $e) {
            DB::rollBack();
            return Response::respondError($e);
        }
    }

    protected function _saveAskSenderDesignRequestNotifications($request_id)
    {
      //  foreach ($members as $member){
     //       $notifiable_users = User::find($member);
            Notification::send(Auth::user(), new RequestSenderNotification($request_id));
     //   }
    }
  
public function createUser()
    {
      /*  if (!request()->user()->can('employee.create')) {
            abort(403, 'Unauthorized action.');
        }*/

        $gender_types = User::getGenders();
        if (request()->user()){
        if (!request()->user()->can('employee.create')) {
                abort(403, 'Unauthorized action.');
            }
        $roles = User::getRolesForCreateEmployee();
        return $this->respond(['gender_types' => $gender_types, 'roles' => $roles]);
        }
        return $this->respond(['gender_types' => $gender_types]);
    }
    public function editUser($id)
    {
        if (!request()->user()->can('employee.edit')) {
            abort(403, 'Unauthorized action.');
        }

        try {
            $user = User::find($id);
            if($user->getFirstMedia('signature'))
            $user->signature = $user->getFirstMedia('signature')->full_url?$user->getFirstMedia('signature')->full_url:$user->getFirstMedia('signature')->original_url;
            if($user->getFirstMedia('logo'))
            $user->logo = $user->getFirstMedia('logo')->full_url?$user->getFirstMedia('logo')->full_url:$user->getFirstMedia('logo')->original_url;
            if($user->getFirstMedia('personal_image'))
            $user->personal_image = $user->getFirstMedia('personal_image')->full_url?$user->getFirstMedia('personal_image')->full_url:$user->getFirstMedia('personal_image')->original_url;
          //  $role_id = $user->roles->first()->id;
            $gender_types = User::getGenders();
            
            $roles = User::getRolesForEmployee();

            $data = ['user' => $user,
                    'gender_types' => $gender_types,
                    'roles' => $roles,
                    'role_ids' => $user->roles->pluck('id'),
                    // 'is_edit_role'=>User::canEditRole(),
                ];

            return $this->respond($data);
        } catch (Exception $e) {
            return $this->respondWentWrong($e);
        }
    }

    public function getPermissionsforAsk()
    {
        $roles = User::getRolesForPermission();
        
        return $this->respond([ 'roles' => $roles]);
    }

    public function getCurrentUser()
    {
        try {
            $user=Auth::user();

          $output=  $this->respond($user);
        } catch (Exception $e) {
            return Response::respondError($e);
            $output = $this->respondWentWrong($e);
        }
        return Response::respondSuccess($output);
    }

    public function getMyUsers()
    {
        $user=Auth::user();
        $my_users = User::
        where(function ($query) {
            $query->where('parent_id',Auth::id());
            $query->orWhere('id', Auth::id());
        })->get();
       // dd($my_users);
        return $my_users;
    }
    public function getMyAgencies()
    {
        $my_users = User::
        whereHas('roles',function ($query) {
            $query->where('name', 'Agency');
        })->get();
        return $my_users;
    }
    public function getUser($id)
    {
        $user=User::findOrFail($id);
      
        return $user;
    }

    public function getStage($id)
    {
        $stage=StageProject::findOrFail($id);
      
        return $stage;
    }



    
    protected function _saveAskedPermissionNotifications($member, $data)
    {
            $notifiable_users = User::find($member);
            Notification::send($notifiable_users, new AskPermissionNotification($data));
    }





  
    
   public function checkRole($role_id) {
    return Role::find($role_id)?Role::find($role_id)->is_primary:null;
   }
 public function getRoles(){
    return Role::all();
 }

   public function checkCurrentUserType($type){
           // $user=Auth::user();
           $role=  User::checkIfUSerHasType($type);
           $output=!Empty($role);;
           return Response::respondSuccess($output);
           //return 
   }
   public function getAllCustomer()
   {
      
        $customers=User::select('id', 'name','email','mobile','id_card_number')->get()->toArray();
       return $customers;
   }
   public function getRole($role_id){
    return Role::find($role_id);
 }
   public function getProjects( Request $request)
   {
      
    $user=Auth::user();
    $projects=[];
    if(!$user->hasRole('superadmin')){
        $childrens=$user->childrenIds($user->id);
        array_push($childrens,$user->id);
        $projects=Project::select('id', 'name')
        ->whereHas('owners', function ($q) use ($childrens) {
            $q->whereIn('owner_id', $childrens);
        })->get()->toArray();
    }
    else{
        $projects=Project::select('id', 'name')->get()->toArray();
    }
    return Response::respondSuccess($projects);
     
   }

   public function getSupporters()
   {
      
       return User::getAllSupporters();
   }
   public function settings(){
    $timezone = config('app.timezone');
    $notification_refresh_timeout = config('constants.notification_refresh_timeout');
    $upload_file_max_size = config('constants.upload_file_max_size');
    return [
        'timezone' => $timezone,
        'notification_refresh_timeout' => $notification_refresh_timeout,
        'upload_file_max_size' => $upload_file_max_size
    ];
   }
   public function getRequestsCount($id){
    $user=User::find($id);
    $childrens=$user->childrenIds($user->id);
    array_push($childrens,$user->id);
    $countDesignRequest = DesignRequest::where('request_type','design_request')
    ->whereIn('customer_id', $childrens)->where('status','sent')->count();
    $countDesignRequestEng = DesignRequest::where('request_type','design_request')
    ->whereHas('offices',function($q) use ($user){
        $q->where('office_id', $user->id)->orWhere('office_id', $user->parent_id);
     })->orWhereHas('designEnginners', function ($q) use ($user) {
           $q->where('enginner_id', $user->id)->where('is_active', 1);
       })->where('status','sent')->count();
    $countContractorRequest = DesignRequest::where('request_type','contractor_request')->whereIn('customer_id', $childrens)->where('status','sent')->count();
    $countServicesRequest = DesignRequest::where('request_type','support_service_request')->whereIn('customer_id', $childrens)->where('status','sent')->count(); 
    $countVisitsRequest = VisitRequest::where('request_type','visit_request')
    ->whereIn('customer_id', $childrens)->where('status','sent')->count(); 
    $countRolesRequest =RequestRole::where('status','pending')->where('user_id',Auth::id())->count();
    $data = ['countDesignRequest' => $countDesignRequest, 'countContractorRequest' => $countContractorRequest, 'countServicesRequest' => $countServicesRequest
,'countVisitsRequest' => $countVisitsRequest,'countRolesRequest' => $countRolesRequest,'countDesignRequestEng'=>$countDesignRequestEng];

    return $data;

}
   
   public function getContrators()
   {
      
       return User::getAllContrators();
   }

   public function  showOfferRequestDetails(Request $request){
    try {

        $support_user = SupportRequestUsers::with('supporter')->where('id',$request->support_user_id)->first();
        if($support_user!=  null){
            return $this->respondSuccess($support_user);
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
}
