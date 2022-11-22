<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Components\User\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Util\CommonUtil;
use App\Components\User\Repositories\UserRepository;
class LoginController extends Controller
{
    use AuthenticatesUsers;
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    protected $commonUtil;
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     */
    /**
     * Create a new controller instance.
     */
    public function __construct(UserRepository $userRepository, CommonUtil $commonUtil)
    {
        $this->middleware('guest')->except('logout');
        $this->CommonUtil = $commonUtil;
        $this->userRepository = $userRepository;
    }

    /**
     * Handle a login request to the application.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
       // dd($this->checkEmail($request->input('email_id_card')));
       // $x= $this->userRepository->getTypeOfUser($request->input('email_id_card'), $request->input('user_type'));
            if($this->checkEmail($request->input('email_id_card'))){
                $user = User::where('email', $request->input('email_id_card'))->first();
            }
            else{
                $user = User::where('id_card_number', $request->input('email_id_card'))->first();
            }
           
            if(isset($user)){
                if (Hash::check($request->password, $user->password)) {
                    $user->last_login=\Carbon\Carbon::now();
                    if(count($user->roles) === 1){
                        $user->user_type_log=$user->roles->first()->type;
                    }
                    if(isset($request->user_type))
                        $user->user_type_log=$request->user_type;
         
                    $user->save();
              
                    return  Auth::login($user);
                }
            }
            else{
                return false;
            }
        
    }

    /**
     * Handles the login redirect for employees & clients.
     *
     * @return string
     */
  /*  protected function redirectTo()
    {
        $user = Auth::user();
        
        if ($user->is_employee) {
            //employee
            return '/admin';
        } else {
            //client
            return '/client';
        }
    }*/

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'email_id_card' => 'required', 'password' => 'required',
        ],
        [
            'required'  => 'The :attribute field is required.',
            'unique'    =>':attribute is already used',
            'email'    => ':attribute  not email'
        ]);
        // adjust as needed
    }


  
    protected function attemptLogin(Request $request)
    {
       
        if($this->checkEmail($request->input('email_id_card'))){
            $user = User::where('email', $request->input('email_id_card'))->first();
        }
        else{
            $user = User::where('id_card_number', $request->input('email_id_card'))->first();
        }
       
        if(isset($user)){
            if (Hash::check($request->password, $user->password)) {
                $user->last_login=\Carbon\Carbon::now();
                
                if(isset($request->user_type))
                    $user->user_type_log=$request->user_type;
               
                
                
                $user->save();
               
                return  Auth::login($user);
            }
        }
        else{
            return false;
        }

        
    }

    function checkEmail($email) {
        $find1 = strpos($email, '@');
        $find2 = strripos($email, '.');
        $x= ($find1 !== false && $find2 !== false && $find2 > $find1);
        return $x;
     }

   
   /*  public function show_all_prescription()
     {
         echo 'gdfffffffffffffffffffg';
         die();
         return view('auth.type');
     }*/
  
}
