<?php
namespace App\Http\Controllers\EnginneringOffice;

use App\Components\Core\Utilities\Helpers;
use App\Components\User\Models\User;
use App\Components\User\Repositories\UserRepository;
use App\Notifications\EmployeeAdded;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Notifications\AskPermissionNotification;
use Notification;
use Illuminate\Support\Facades\Redirect;
use App\Http\Responses\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequestCreate;
use App\Http\Requests\User\UserRequestEdit;
use App\Http\Resources\UserResource;

class UserController extends  Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {     
        if (!request()->user()->can('employee.view')) {
            abort(403, 'Unauthorized action.');
        }


        $rowsPerPage = ($request->get('per_page') > 0) ? $request->get('per_page') : 0;

   
            $users = User::with('roles','specialty','parent','parent.roles')->where('is_emp',1)
            ->where(function ($query) {
                $query->where('parent_id',Auth::id());
    
            });
        if (!empty($request->get('name'))) {
            $term = $request->get('name');
            $users->where('name', 'like', "%$term%");
        }
        if (!empty($request->get('email'))) {
            $term = $request->get('email');
            $users->where('email', 'like', "%$term%");
        }

        $users = UserResource::collection($users->latest()->simplePaginate($rowsPerPage));

  
        return $this->respond($users);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!request()->user()->can('employee.create')) {
            abort(403, 'Unauthorized action.');
        }

        $gender_types = User::getGenders();

        $roles = User::getRolesForCreateEmployee();
        
        return $this->respond(['gender_types' => $gender_types, 'roles' => $roles]);
    }





 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequestCreate $request)
    {
        if (!request()->user()->can('employee.create')) {
            abort(403, 'Unauthorized action.');
        }

        try {
            DB::beginTransaction();

            $input = $request->only('name','location_data', 'email', 'mobile', 'alternate_num', 'home_address', 'current_address', 'skype', 'linkedin', 'facebook', 'twitter', 'birth_date', 'gender', 'note', 'password','active', 'account_holder_name', 'account_no', 'bank_name', 'bank_identifier_code', 'branch_location', 'tax_payer_id','id_card_number','specialty_id');
            $input['parent_id']=Auth::id(); 
            $input['isActive']=1; 
            $input['is_emp']=1; 
            $input['user_type_log']='ENGINEERING_OFFICE_MANAGER';
   

                       /** @var User $user */
            $user = $this->userRepository->create($input);
            if($request->signature){
               
             //   $user->clearMediaCollection('signature');
                $user->addMediaFromBase64($input['signature'])->usingFileName('signature'.time().'.png')->toMediaCollection('signature');
            }
            if($request->personal_image)
            $user->addMediaFromBase64($request->personal_image)->usingFileName('avatar'.time().'.png')->toMediaCollection('personal_image');
            $role_ids = $request->input('role');
            if(is_string($role_ids))
            $role_ids = explode(',' ,$role_ids);
            if (!empty($role_ids)) {
                foreach($role_ids as $role_id){
                        $role = Role::findOrFail($role_id);
                        $user->roles()->attach($role);
                }
            }
         
            if (!empty($request->input('send_email'))) {
                $this->_sendEmailToEmployee($input, $user);
            }
            DB::commit();

            $output = $this->respondSuccess(__('messages.saved_successfully'));
        } catch (Exception $e) {
            DB::rollBack();
            $output = $this->respondWentWrong($e);
        }

        return $output;
    }
    public function addCustomer(UserRequestCreate $request){


        if (!request()->user()->can('employee.create')) {
            abort(403, 'Unauthorized action.');
        }

        try {
            DB::beginTransaction();

            $input = $request->only('name', 'email','location_data', 'mobile', 'alternate_num', 'home_address', 'current_address', 'skype', 'linkedin', 'facebook', 'twitter', 'birth_date', 'gender', 'note', 'password', 'active', 'account_holder_name', 'account_no', 'bank_name', 'bank_identifier_code', 'branch_location', 'tax_payer_id','id_card_number');
            $input['parent_id']=Auth::id(); 
            $input['isActive']=1; 
            $input['user_type_log']='ESTATE_OWNER';
            /** @var User $user */
            $user = $this->userRepository->create($input);
            $role = Role::where('type','ESTATE_OWNER')->first();;
            $user->roles()->attach($role);
            if($request->signature){
                   $user->addMediaFromBase64($request->signature)->usingFileName('signature'.time().'.png')->toMediaCollection('signature');
               }
               if($request->personal_image)
               $user->addMediaFromBase64($request->personal_image)->usingFileName('avatar'.time().'.png')->toMediaCollection('personal_image');
            if (!empty($request->input('send_email'))) {
                $this->_sendEmailToEmployee($input, $user);
            }
            DB::commit();

            $output = $this->respondSuccess(__('messages.saved_successfully'));
        } catch (Exception $e) {
            DB::rollBack();
            $output = $this->respondWentWrong($e);
        }

        return $output;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!request()->user()->can('employee.view')) {
            abort(403, 'Unauthorized action.');
        }

        $user = new UserResource(User::find($id));
        return $this->respond($user);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequestEdit $request, $id)
    {

        try {
            DB::beginTransaction();

            $payload = $request->only(
                'signature',
                'name',
                'mobile',
                'alternate_num',
                'home_address',
                'current_address',
                'location_data',
                'skype',
                'linkedin',
                'facebook',
                'twitter',
                'birth_date',
                'gender',
                'note',
                'email',
                'password',
                'active',
                'account_holder_name',
                'account_no',
                'bank_name',
                'bank_identifier_code',
                'branch_location',
                'tax_payer_id',
                'id_card_number',
                'specialty_id'

            );

            // if password field is present but has empty value or null value
            // we will remove it to avoid updating password with unexpected value
            if (!Helpers::hasValue($payload['password'])) {
                unset($payload['password']);
            }
      
        
              
            $updated =$this->userRepository->update($id,$payload);
            if (!$updated) {
                return $this->respondWithError(__('messages.failed_to_update'));
            }
            
          
            /** @var User $user */
            $user = $this->userRepository->find($id);
           
            if($request->personal_image && $request->personal_image!=='delete'){
                $user->clearMediaCollection('personal_image');
            $user->addMediaFromBase64($request->personal_image)->toMediaCollection('personal_image');
            }
            if($request->personal_image==='delete'){
                $user->clearMediaCollection('personal_image');
            }
            if($request->signature && $request->signature!=='delete'){    
                $user->clearMediaCollection('signature');
                $user->addMediaFromBase64($payload['signature'])->usingFileName('signature'.time().'.png')->toMediaCollection('signature');
            }
            if($request->signature==='delete'){
                $user->clearMediaCollection('signature');
            }
            $user->roles()->detach();
    
            $role_ids = $request->input('role');
            if (!empty($role_ids)) {
                foreach($role_ids as $role_id){
                 $role = Role::findOrFail($role_id);
                 if(!$user->hasRole($role->name))
                       $user->roles()->attach($role);
                        
                }
                
            }

            if (!empty($request->input('send_email')) && !empty($payload['password'])) {
                $this->_sendEmailToEmployee($payload, $user);
            }
           
           
            DB::commit();

            $output = $this->respondSuccess(__('messages.updated_successfully'));
            
        } catch (Exception $e) {
            DB::rollBack();
            $output = $this->respondWentWrong($e);
        }
        return $output;
    }
  public function addNewEmployee(Request $request){
    $customer = User::find($request->id);
   // dd($request->all(),$customer);
    if($customer->parent_id === null){
        $customer->parent_id = Auth::id();
        $customer->is_emp = 1;
        $customer->specialty_id = $request->specialty_id;
        $customer->roles()->attach(Role::find(7));
        $customer->save();
        $output = $this->respondSuccess(__('messages.updated_successfully'));
    }
    else{
        $output = $this->respondSuccess(__('messages.employee_busy'));
    }
return $output;
  }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!request()->user()->can('employee.delete')) {
            abort(403, 'Unauthorized action.');
        }

        // do not delete self
        if ($id == auth()->user()->id) {
            return $this->respondWithError(__('messages.action_forbidden'));
        }

        try {
            $this->userRepository->delete($id);
            $output = $this->respondSuccess(__('messages.deleted_successfully'));
        } catch (\Exception $e) {
            $output = $this->respondWentWrong($e);
        }

        return $output;
    }

    /**
     * Get employee
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEmployee($id)
    {
        $user = User::findOrFail($id);

        return $this->respond($user);
    }

    /**
     * send email to employee
     * when added in application
     *
     * @return \Illuminate\Http\Response
     */
    protected function _sendEmailToEmployee($data, $user)
    {
        $user->notify(new EmployeeAdded($data));
    }

    public function getAllEmployee()
    {
        $users = User::getUsersForDropDown();
        return $users;
    }

    public function getStatistics()
    {
        if (!request()->user()->can('employee.view')) {
            abort(403, 'Unauthorized action.');
        }
        
        $users = 
                    User::with('roles')->where(function ($query) {
                        $query->where('parent_id',Auth::id());
                      //  $query->orWhere('id', Auth::id());
                    })->count();
        $in_active =  User::with('roles')->where(function ($query) {
                        $query->where('parent_id',Auth::id());
                     //   $query->orWhere('id', Auth::id());
                    })-> whereNull('active')->count();
                       
        $active = User::with('roles')->where(function ($query) {
            $query->where('parent_id',Auth::id());
        //    $query->orWhere('id', Auth::id());
        })-> where('active','!=',null)->count();

        $statistics = ['users' => $users, 'in_active' => $in_active, 'active' => $active];
        
        return $this->respond($statistics);
    }


    public function getUserData(Request $request){
        $users = User::getUserByRoleType($request->get('name'));
        $data = [
            'users' =>$users,
            'type' =>Role::where('id', $request->get('name'))->first()->name, //config('constants.user_types')[$request->get('name')]
        ];
        return $this->respond($data);
    }
    public function checkUserType(Request $request){
        $x= $this->userRepository->getTypeOfUser($request->get('email'), $request->get('user_type'));
        return $this->respond( $x);
        
    }

    public function getType(Request $request){
        $x= $this->userRepository->getType($request->get('email'), $request->get('password'));
        return $this->respond( $x);
        
    }

    public function getAllOfficeUsers()
    {
       // $users = User::getOfficeUsers();
       $users = User::getAllOfficeUsers();
        return $users;
    }

    public function getAllOffices()
    {
       // $users = User::getOfficeUsers();
       $users = User::getAllOffices();
        return $users;
    }

    public function getUsersOffice($id)
    {
       // $users = User::getOfficeUsers();
       $users = User::getUsersOffice($id);
        return $users;
    }

    public function getEmployeesOfficeForSpecialty(Request $request)
    {
      $employees = [];
       if (isset($request->office_id) &&  isset($request->specialty_id) ) {
             $employees = User::getUsersOfficeForSpecialty($request->office_id, $request->specialty_id);
       }
        return $employees;
    }
    public function getAllEmployeeForRequest($id)
    {
       // $users = User::getOfficeUsers();
       $employees = User::getAllEmployee($id);
        return $employees;
    }

    
   

   public function getCustomers(){
   
  
        $customers = User::whereHas(
            'roles', function($q){
                $q->where('type', 'ESTATE_OWNER');
            }
        )->select('id', 'name','email','id_card_number','mobile')
        ->orderBy('name')
        ->get()
        ->toArray();
      
        return $customers;
   }

 
}
