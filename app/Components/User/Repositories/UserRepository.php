<?php

namespace App\Components\User\Repositories;
use Illuminate\Support\Facades\Auth;
use App\Components\Core\BaseRepository;
use App\Components\User\Models\User;
use App\Http\Util\CommonUtil;
use Illuminate\Support\Facades\Hash;
class UserRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * list all users
     *
     * @param array $params
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]|mixed[]
     */
    public function listUsers($params)
    {
        return $this->get($params);
    }

    /**
     * delete a user by id
     *
     * @param int $id
     * @return bool
     * @throws \Exception
     */
    public function delete(int $id)
    {
        $ids = explode(',', $id);

        foreach ($ids as $id) {
            /** @var User $User */
            $User = $this->model->find($id);
            
            if (!$User) {
                return false;
            };
            
            $User->syncRoles([]);
            $User->syncPermissions([]);
            $User->delete();
        }

        return true;
    }

    function checkEmail($email) {
        $find1 = strpos($email, '@');
        $find2 = strripos($email, '.');
      //  dd($find2);
        $x= ($find1 !== false && $find2 !== false && $find2 > $find1);
        return $x;
     }

     public  function getType($email,$password)
     {
        $user=null;
         if($this->checkEmail($email)){
          $user =User::where('email',$email)->first();
       
          
        }
        else{
            $user =User::where('id_card_number',$email)->first();
             
        }
       if($user != null){
            if (Hash::check($password, $user->password)) {
                $roles=$user->roles;//->where('is_primary',1);
                $data=[
                    'success'=>true,
                    'roles'=>$roles,
                    'description'=>[],
                    'user'=>$user,
                    
                ];
              return  $data;
               
            }
            else{
                $data=[
                    'success'=>false,
                    'roles'=>[],
                     'pass'=>false,
                     'description'=>__('messages.password_not_match') ,
                    'user'=>null,
                ];
                return  $data;
            }
         
     
       }
       else{
        $data=[
            'success'=>false,
            'roles'=>[],
            'pass'=>true,
            'description'=>__('messages.user_not_found') ,
            'user'=>null,
        ];
        return  $data;
       }
   
                     
        
     }


       //check user type
       public  function getTypeOfUser($email,$id)
       { 
        if($this->checkEmail($email)){
            $user =User::where('email',$email)->first();
        }
        else{
            $user =User::where('id_card_number',$email)->first();
        }
           
           if($user != null){
            foreach ($user->roles as $role) {
                if($role->id==$id){
                     return true;
                }
           }
           }
           return false;
      
       } 
}
