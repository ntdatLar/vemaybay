<?php

namespace App\Http\Controllers\__Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests;
use App\Http\Requests\Login;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function getLogin(){
        return view("user.login");
    }
    public function postLogin(Login $request){
        $login = [
            'name'      => $request->user_name,
            'password'  => $request->user_pass,
            'status'	=> 1
        ];
        if(Auth::attempt($login)){
            return redirect(url(''));
        }else{
            return redirect(url(''))->with(['flash_messages'=>'Tên đăng nhập hoặc mật khẩu không đúng !','flash_level'=>'login']);
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect(url(''));
    }
}
