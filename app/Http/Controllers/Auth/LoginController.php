<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
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

    use AuthenticatesUsers;

    /**
     * To limit the failed login attempts
     * overwrite the values of below two variables
     *
     * @var int
     */
    protected $maxAttempts = 3; // Default is 5
    protected $decayMinutes = 2; // Default is 1

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $this->validateLogin($request);
        if($this->attemptLogin($request)){
            $user = $this->guard()->user();
//            $user->generateToken();
            $user->setRememberToken(str_random(16));
            Session::put('user',$user);

//            return view('/home');
            return response()->json([
                'data' => $user->toArray(),
            ]);
        }

        return $this->sendFailedLoginResponse($request);

    }

    public function logout(Request $request)
    {
        //$user = Auth::guard('api')->user();
        $user = $this->guard()->user();
        if($user){
            $user->remember_token=null;
            $user->save();
            Session::forget('user');
        }

//        return view('auth/login');
//        return $user;
        return response()->json(['data'=>'User Logged Out'],200);
    }
}
