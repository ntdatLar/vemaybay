<?php namespace App\Http\Controllers\__Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginResquest;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;
		//$this->middleware('guest', ['except' => 'admin/logout']);
	}
	public function getLogin(){
		return view('admin.login');
	}
	public function postLogin(LoginResquest $resquest){
		$login = [
			'name' => $resquest->username,
			'password' => $resquest->userpass,
			'level'	=> 1
		];
		if(Auth::attempt($login)){
			return redirect(url('admin'));
		}else{
			return redirect()->back();
		}
	}
	public function getLogout()
	{
		Auth::logout();
		return redirect(url('admin/login'));
	}

}
