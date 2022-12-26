<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequestCreate;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
   public function __construct()
   {
       $this->middleware('auth:api', ['except' => ['login']]);
   }

   /**
    * Get a JWT via given credentials.
    *
    * @return \Illuminate\Http\JsonResponse
    */
   public function login()
   {
       $credentials = request(['email', 'password']);
      
       if (! $token = auth()->attempt($credentials)) {
           return response()->json(['error' => 'Unauthorized'], 401);
       }

       $output = [
        'success' => true,
        'msg' => __('messages.registered_successfully'),
        'user'=> auth()->user()
    ];
       return $this->respondWithToken($token, $output);
   }

   public function register(UserRequestCreate $request)
   {

  //  $this->validator($request->all())->validate();
    try {
        DB::beginTransaction();

        $input = $request->only('name','location_data', 'email', 'mobile', 'alternate_num', 'home_address', 'current_address', 'skype', 'linkedin', 'facebook', 'twitter', 'birth_date', 'gender',  'password', 'id_card_number');
         $input['active']=true;
         $input['isActive']=1; 
         $input['user_type_log']='ESTATE_OWNER';
         
        /** @var User $user */
        $user = $this->userRepository->create($input);
        
        if($request->personal_image)
        $user->addMediaFromBase64($request->personal_image)->usingFileName('avatar'.time().'.png')->toMediaCollection('personal_image');

        $user->assignRole('Estate Owner');

        if($request->signature){
            $user->addMediaFromBase64($request->signature)->usingFileName('signature'.time().'.png')->toMediaCollection('signature');
        }

        DB::commit();

        $output = [
            'success' => true,
            'msg' => __('messages.registered_successfully')
        ];
        
       if (! $token = auth()->attempt([$user->email,$user->password])) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    return $this->respondWithToken($token, $output);
    } catch (\Exception $e) {
        DB::rollBack();
        $output = [
            'success' => false,
            'msg' => __('messages.something_went_wrong')
        ];
    }

   }
   /**
    * Get the authenticated User.
    *
    * @return \Illuminate\Http\JsonResponse
    */
   public function user()
   {
       return response()->json(auth()->user());
   }

   /**
    * Log the user out (Invalidate the token).
    *
    * @return \Illuminate\Http\JsonResponse
    */
   public function logout()
   {
       auth()->logout();

       return response()->json(['message' => 'Successfully logged out']);
   }

   /**
    * Refresh a token.
    *
    * @return \Illuminate\Http\JsonResponse
    */
   public function refresh()
   {
       return $this->respondWithToken(auth()->refresh());
   }

   /**
    * Get the token array structure.
    *
    * @param  string $token
    *
    * @return \Illuminate\Http\JsonResponse
    */

}
