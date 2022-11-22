<?php

namespace App\Http\Controllers;
use App\Components\Core\Utilities\Helpers;
use App\Components\User\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Components\User\Repositories\UserRepository;
class ManageProfileController extends Controller
{
     /**
     * @var UserRepository
     */
    private $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $user_id = request()->user()->id;
            $user = User::with('media','specialty','roles')->findOrFail($user_id);
            $user->signature = $user->getFirstMedia('signature')?$user->getFirstMedia('signature')->full_url:'';
            $user->logo = $user->getFirstMedia('logo')?$user->getFirstMedia('logo')->full_url:'';
            $user->personal_image = $user->getFirstMedia('personal_image')?$user->getFirstMedia('personal_image')->original_url:'';
            $output = $this->respond($user);
        } catch (Exception $e) {
            $output = $this->respondWentWrong($e);
        }

        return $output;
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
        // if (!request()->user()->can('profile.edit')) {
        //     abort(403, 'Unauthorized action.');
        // }

        try {
            $user = User::find($id);
            $user->signature = $user->getFirstMedia('signature')?$user->getFirstMedia('signature')->original_url:'';
            $user->logo = $user->getFirstMedia('logo')?$user->getFirstMedia('logo')->original_url:'';
            $user->personal_image = $user->getFirstMedia('personal_image')?$user->getFirstMedia('personal_image')->original_url:'';
            $role_id = $user->roles->first()->id;
            $gender_types = User::getGenders();
            
            //$roles = User::getRolesForEmployee();

            $data = ['user' => $user,
                    'gender_types' => $gender_types,
                    //'roles' => $roles,
                    //'role_ids' => Auth::user()->roles->pluck('id'),
                    // 'is_edit_role'=>User::canEditRole(),
                ];

            //return $this->respond($data);

      
            $output = $data;// $this->respond(['user' => $user, 'gender_types' => $gender_types]);
        } catch (Exception $e) {
            $output = $this->respondWentWrong($e);
        }

        return $output;
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
          //  if (!request()->user()->can('employee.edit')) {
        //    abort(403, 'Unauthorized action.');
        //}
        //$user=User::findOrFail($id);
        $validate = validator($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
        ],
        [
            'required'  => 'The :attribute field is required.',
           // 'unique'    =>':attribute is already used',
            'email'    => ':attribute  not email'
        ]
       
    );

      
        if ($validate->fails()) {
            return $this->respondWithError($validate->errors()->first());
        }

        try {
            DB::beginTransaction();

            $payload = $request->only(
                'signature',
                'name',
                'mobile',
                'alternate_num',
                'home_address',
                'current_address',
                'skype',
                'linkedin',
                'location_data',
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
           'title'
            );

            // if password field is present but has empty value or null value
            // we will remove it to avoid updating password with unexpected value
            if (!Helpers::hasValue($payload['password'])) {
                unset($payload['password']);
            }
            
            if(isset($request->enginnering_type))
               $payload['enginnering_type']=json_encode($request->enginnering_type);
            $updated =$this->userRepository->update($id,$payload);
            if (!$updated) {
                return $this->respondWithError(__('messages.failed_to_update'));
            }
            
          
            /** @var User $user */
            $user = $this->userRepository->find($id);
          //  dd($request->all());
          if($request->file && $request->file!=='delete'){
            $user->clearMediaCollection('logo');
        $user->addMediaFromBase64($request->file)->toMediaCollection('logo');
        }
        if($request->file==='delete'){
            $user->clearMediaCollection('logo');
        }
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
            // $role_ids = $request->input('role');
            // if (!empty($role_id)) {
            //     foreach($role_ids as $role_id){
            //         $role = Role::findOrFail($role_id);
            //         if(!Auth::user()->hasRole('superadmin') && $role->is_primary  && !$user->hasRole($role->name)){
            //                     return $this->respondWithError(__('data.not_permiision_to_assign_primary_role'));
            //         }
            //         else{
            //             if(!$user->hasRole($role->name))
            //                $user->roles()->attach($role);
            //         }
            //     }
            // }

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
}
