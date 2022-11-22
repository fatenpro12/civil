<?php

namespace App\Components\User\Models;

use App\Location;
use App\Project;
use App\System;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Activitylog\LogOptions;

/**
 * Class User.
 *
 * @property int         $id
 * @property string      $name
 * @property string      $email
 * @property array       $permissions
 * @property string|null $active
 */
class User extends Authenticatable implements HasMedia
{
    use Notifiable,
        LogsActivity,
        HasRoles,
        InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    protected static $logUnguarded = true;
    protected static $logOnlyDirty = true;
    protected $appends = ['avatar_url'];

    const USER_ROLE_ADMIN_USER = 'superadmin';
    const USER_ROLE_EMPLOYEE_ENGINEER_USER = 'Engineering Office Manager';
    const USER_ROLE_ESTATE_OWNER_USER = 'Estate Owner';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * the validation rules.
     *
     * @var array
     */
    public static $rules = [];

    /**
     * hashes password.
     *
     * @param $password
     */
    
    public function designRequests()
    {
        return $this->belongsToMany('Models\DesignRequest','design_request_office');
    }
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
    /**
     * register medias for users
     *
     */

    public function project_owners()
    {
        return $this->belongsToMany(Project::class, 'project_owners', 'owner_id','project_id')->withPivot('status');
    }
    public function registerMediaCollections() : void
    {
        $this
            ->addMediaCollection('avatar')
            ->singleFile();
    }
    
 public function engineers(){
    return $this->hasMany('App/DesignEnginner', 'engineer_id');
 }
    /**
     * logs last login date of the user.
     */
    public function logLastLogin()
    {
        $this->last_login = $this->freshTimestamp();
        $this->save();
    }

    public function getActivitylogOptions(): LogOptions
{
    return LogOptions::defaults();
}
    /**
     * Scope a query to only include Employess.
     * (one that does not have customer_id).
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeEmployees($query)
    {
        return $query->where('customer_id', null);
    }

    public function scopeOfName($query, $name)
    {
        if (null === $name || '' === $name) {
            return false;
        }

        return $query->where('name', 'LIKE', "%{$name}%");
    }

    public function scopeOfEmail($query, $email)
    {
        if (null === $email || '' === $email) {
            return false;
        }

        return $query->where('email', '=', $email);
    }

    /**
     * Get all of the employee's notes.
     */
    public function notes()
    {
        return $this->morphMany('App\Note', 'notable');
    }
    
    /**
     * Get the leaves for the employee.
     */
    public function leaves()
    {
        return $this->hasMany('App\Leave');
    }

    /**
     * Get user avatar.
     */
    public function getAvatarUrlAttribute()
    {
        return optional($this->getMedia('avatar')->first())
            ->getFullUrl();
    }

    /**
     * Get the user type (employee or client).
     *
     * @return string
     */
    public function getUserTypeAttribute()
    {
        if (empty($this->customer_id)) {
            return 'employee';
        } else {
            return 'client';
        }
    }

    /**
     * Check if user type is employee.
     *
     * @return bool
     */
    public function getIsEmployeeAttribute()
    {
        return empty($this->customer_id);
    }

    /**
     * Check if user type is client.
     *
     * @return bool
     */
    public function getIsClientAttribute()
    {
        return !empty($this->customer_id);
    }

    /**
     * Customer for the contact.
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function specialty()
    {
        return $this->belongsTo('App\Specialty');
    }
    
    /**
     * retrieve users for dropdown.
     *
     * @return $users
     */
    public static function getUsersForDropDown($append_all = false)
    {
        $users = User::
                        select('id', 'name')
                        ->orderBy('name')
                        ->get()
                        ->toArray();

        if ($append_all) {
            $users = array_merge([['id' => 0, 'name' => __('messages.all')]], $users);
        }
        return $users;
    }
    public function projects()
    {
        return $this->belongsToMany('App\Project', 'project_members', 'user_id', 'project_id');
    }
    public function projectCreator()
    {
        return $this->belongsTo('App\Project', 'created_by');
    }
    public static function getUsersMemberForDropDown($append_all = false)
    {
        $user=Auth::user();
        if ($user->hasRole('superadmin')){
            $users = User::select('id', 'name')
            ->orderBy('name')
            ->get()
            ->toArray();
        }
        else{
            $users=User::
            where(function ($query) {
                $query->where('parent_id',Auth::id());
                $query->orWhere('id', Auth::id());
            })->select('id', 'name')
            ->orderBy('name')
            ->get()->toArray();
        }
        if ($append_all) {
            $users = array_merge([['id' => 0, 'name' => __('messages.all')]], $users);
        }
        return $users;
    }

///Enginnering OFFICE 

    public static function getRolesForEnginneringOffice()
    {
                $roles = Role:: where(function ($query) {
                $roles_ids = Auth::user()->roles->pluck('id');
                $query->where('is_primary',0);
                ///$query->whereIn('id', $roles_ids);
                $query->orWhere('created_by',Auth::id());
            })->select('id', 'name')
                        ->get()
                            ->toArray();


            return $roles;

    }
    public function isAdmin() : bool
    {
        return $this->hasRole(self::USER_ROLE_ADMIN_USER);
    }
    public function isEmployeeEngineer() : bool
    {
        return $this->hasRole(self::USER_ROLE_ADMIN_USER);
    }
    public function isEstateOwner() : bool
    {
        return $this->hasRole(self::USER_ROLE_ESTATE_OWNER_USER);
    }
    public static function getRolesForEmployee()
    {
        // $roles = Role::where('type', 'employee')
        //             ->get()
        //             ->toArray();
        // $user=Auth::user();
        // if ($user->hasRole('superadmin'))
        //  {
            
        //  }
        //  else{

        //     $roles = Role:: where(function ($query) {
        //         $roles_ids = Auth::user()->roles->pluck('id');
        //         //$query->where('is_primary',0);

        //         $query->whereIn('id', $roles_ids);
        //         $query->orWhere('created_by',Auth::id());
        //     })->select('id', 'name')
        //                   ->get()
        //                     ->toArray();
        //    // $roles =$user->roles->where('is_primary',0)->get()
        //      //                ->toArray();
            
        //  }
         $roles=Role::all();      
        return $roles;
    }
    public static function getRolesForCreateEmployee()
    {
        // $roles = Role::where('type', 'employee')
        //             ->get()
        //             ->toArray();
        $user=Auth::user();
        if ($user->hasRole('superadmin'))
         {
            $roles=Role::all();
         }
         else{

            $roles = Role:: where(function ($query) {
                $roles_ids = Auth::user()->roles->pluck('id');
                $query->where('is_primary',0);
                $query->whereIn('created_by', $roles_ids);

            })->select('id', 'name')
                          ->get()
                            ->toArray();            
         }
                    
        return $roles;
    }
    public static function canEditRole(){
        $user=Auth::user();
        if ($user->hasRole('superadmin'))
         {
            return true;
         }
         else{
           return  false;             
         }
    }

    public static function getRolesForPermission()
    {
       
        $roles = Role:: where(function ($query) {
            $roles_ids = Auth::user()->roles->pluck('id');
            $query->where('is_primary',1);
            $query->where('id','!=',6);
            $query->whereNotIn('id', $roles_ids);
        })->select('id', 'name')
                      ->get()
                        ->toArray();
                    
        return $roles;
    }
    /**
     * retrieve gender for dropdown.
     *
     * @return array
     */
    public static function getGenders()
    {
        return [
                ['value' => 'male',
                 'text' => __('messages.male'),
                ],
                ['value' => 'female',
                 'text' => __('messages.female'),
                ]
            ];
    }


    public static function getUserTypes()
    {
        return [
                ['value' => 'ESTATE_OWNER',
                 'text' => __('Estate Owner'),
                ],
                ['value' => 'ENGINEERING_OFFICE_MANAGER',
                 'text' => __('Engineering Office Manager'),
                ],
                ['value' => 'SUPPORT_SERVICES_OFFICE',
                 'text' => __('Support Service Office'),
                ],



                ['value' => 'CONTRACTING_COMPANY',
                'text' => __('Contracting  Company'),
               ],
               ['value' => 'GOVERNMENT_AGENCIES',
                'text' => __('Government Agencies'),
               ],
               ['value' => 'SITE_MANAGENMENT',
                'text' => __('Site Managnment'),
               ],
            ];
    }
    
    
    /**
     * retrieve all the permissions
     * of user.
     *
     * @return array
     */
    public static function getUserPermissions($user)
    {
        $role_type = $user->user_type_log;//getAllPermissions();
      
       $role=Role::where('type',$role_type)->first();
       $userPermissions =$role->permissions;
        $permissions = [];
        foreach ($userPermissions as $userPermission) {
            $permissions[$userPermission->name] = 1;
        }

        if (($user->hasRole('superadmin'))) {
            $permissions['superadmin'] = 1;
        }

        return $permissions;
    }


    public static function getUserByRoleType($id)
    {
      
        //check if role not null
        $role=Role::where('id', $id)->first();
       //$role=Role::where('type', $type)->first();
        $users=[];
        if($role != null){
            $users= $role->users() ->select('id', 'name')
            ->orderBy('name')
            ->get()
            ->toArray();
        }
  
         return $users;
    }



    //check user type
    public static function getTypeOfUser($email,$id)
    {
        $user =User::where('email',$email)->first();
        foreach ($user->roles as $role) {
           if($role->id==$id){
                return 'true';
           }
  
        }
        return 'false';
    }


    /**
     * retrieve all the roles
     * of user.
     *
     * @return array
     */
    public static function getUserRoles($user)
    {
        $user_roles = $user->roles;

        $roles = [];
        foreach ($user_roles as $user_role) {
            $roles[$user_role->name] = 1;
        }

        if (($user->hasRole('superadmin'))) {
            $permissions['superadmin'] = 1;
        }

        return $roles;
    }

    /**
     * retrieve date format
     * of app.
     *
     */
    public static function appDateFormat()
    {
        $value = System::where('key', 'date_format')->value('value');

        if ($value == 'd-m-Y') {
            return ['KEY' => 'd-m-Y', 'VALUE' => 'DD-MM-YYYY'];
        } elseif ($value == 'm-d-Y') {
            return ['KEY' => 'm-d-Y', 'VALUE' => 'MM-DD-YYYY'];
        } elseif ($value == 'd/m/Y') {
            return ['KEY' => 'd/m/Y', 'VALUE' => 'DD/MM/YYYY'];
        } elseif ($value == 'm/d/Y') {
            return ['KEY' => 'm/d/Y', 'VALUE' => 'MM/DD/YYYY'];
        }
    }

    /**
     * retrieve time format
     * of app.
     *
     */
    public static function appTimeFormat()
    {
        $value = System::where('key', 'time_format')->value('value');

        return $value;
    }


    //add my code
    public function visitRequests()
    {
        return $this->hasMany('App\VisitRequest','customer_id');
    }

    public function GetAgencies()
    {
        return $this->hasMany('App\Agency','user_id');
    }


    public function getAllPermissionsAttribute() {
        $permissions = [];
          foreach (Permission::all() as $permission) {
            if (Auth::user()->can($permission->name)) {
              $permissions[] = $permission->name;
            }
          }
          return $permissions;
      }


      public static function checkIfUSerHasType($type)
      {
         $role = User::whereHas(
            'roles', function($q){
                $q->where('type', 'ENGINEERING_OFFICE_MANAGER');//''
            },
            
        )->where('id',Auth::id())->first();
          return $role;
      }
      public static function getAllOfficeUsers($append_all = false)
      {
         $users = User::whereHas(
            'roles', function($q){
                $q->where('type', 'ENGINEERING_OFFICE_MANAGER');
            }
        )->select('id', 'name')
        ->orderBy('name')
        ->get()
        ->toArray();
          return $users;
      }
  

      public static function getAllOffices($append_all = false)
      {
        $users = User::whereHas(
            'roles', function($q){
                $q->where('type', 'ENGINEERING_OFFICE_MANAGER');
                $q->where('is_primary',1);
            }
        )
      //  ->where('parent_id',1)->select('id', 'name')
        ->orderBy('name')
        ->get()
        ->toArray();
   
          return $users;
      }
      public static function getAllContractors($append_all = false)
      {
        $users = User::whereHas(
            'roles', function($q){
                $q->where('type', 'CONTRACTING_COMPANY');
            }
        )
        ->orderBy('name')
        ->get()
        ->toArray();
   
          return $users;
      }
      public static function getAllSupportServices($append_all = false)
      {
        $users = User::whereHas(
            'roles', function($q){
                $q->where('type', 'SUPPORT_SERVICES_OFFICE');
            }
        )
        ->orderBy('name')
        ->get()
        ->toArray();
          
          return $users;
      }
      
      public static function getUsersOffice($id)
      {
        $users = User::
        // whereHas(
        //     // 'roles', function($q){
        //     //     $q->where('type', 'ENGINEERING_OFFICE');
        //     // }
        // )-
        where('parent_id',$id)->select('id', 'name')
        ->orderBy('name')
        ->get()
        ->toArray();
   
          return $users;
      }


      public static function getUsersOfficeForSpecialty($office_id,$specialty_id)
      {
        $users = User::where('parent_id',$office_id)
      //  ->where('is_emp',1)
        ->where('specialty_id',$specialty_id)
        ->permission('project.list')
        ->select('id', 'name')
        ->orderBy('name')
        ->get()->toArray();
        return  $users;//  $employees;

      }

      public static function getUsersOfficeForRequest($id)
      {
        $users = User::
       
        where('parent_id',$id)
        ->where('is_emp',1)
        ->permission('project.list')
        ->select('id', 'name')
        ->orderBy('name')
        ->get()->toArray();
        return  $users;//  $employees;

      }
      public static function getAllEmployee($id)
      {
        $users = User::
       
        where('parent_id',$id)
        ->where('is_emp',1)
       // ->permission('project.list')
        ->select('id', 'name')
        ->orderBy('name')
        ->get()->toArray();
       
       // $permission = Permission::findByName('project.list')->toArray();;
        
       
        // ->toArray();
        return  $users;//  $employees;
         // return $users;
      }
          /**
     * Get the leaves for the employee.
     */
    public function documents()
    {
        return $this->hasMany('App\Document');
    }



        /**
     * Get the leaves for the employee.
     */
    public function requestRoles()
    {
        return $this->hasMany('App\RequestRole');
    }


    public function children()
    {        
        return $this->hasMany('App\Components\User\Models\User','parent_id');
    }
    public function parent()
    {        
        return $this->belongsTo('App\Components\User\Models\User','parent_id');
    }
    public function childrenIds($parent_id){
      return   User::where('parent_id', $parent_id)
        ->pluck('id')
        ->toArray();
    }



}
