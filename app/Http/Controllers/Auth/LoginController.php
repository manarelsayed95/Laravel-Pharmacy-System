<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Auth;
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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:doctor')->except('logout');
    }

    public function showDoctorLoginForm()
    {
        return view('auth.login', ['url' => 'doctor']);
    }

    public function doctorLogin(Request $request)
    {
        
        $credentials = $request->only('email', 'password');

        if (Auth::guard('doctor')->attempt($credentials)) {

            return redirect()->intended('/doctor');
        }
        else{dd('Error!!');}
        return back()->withInput($request->only('email', 'remember'));
    }
}
