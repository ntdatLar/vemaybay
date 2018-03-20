<?php namespace App\Http\Controllers\Home;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginResquest;
use App\Model\Cate;
use App\Model\Location;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Http\Request;
use App\Http\Requests\Register;
use Illuminate\Support\Facades\Input;
use Request;
use App\Model\User;

class UserController extends Controller {

	public function getRegister(){
		return view('front-end.user.register');
	}
	public function postRegisterUser(Register $request){
		$addr = "";
		$user = new User();
		$user->name      = $request->name;
		$user->fullname  = $request->user_fullname;
		$user->email  = $request->user_email;
		$user->phone  = $request->user_phone;
		$user->birthday  = $request->user_birthday;
		$user->gender  = $request->user_gender;
		$user->remember_token  = $request->_token;
		$user->addr  = $addr;
		$user->point  = 0;
		$user->coin  = 0;
		$user->level  = 1;
		$user->status  = 1;
		$user->password  = bcrypt($request->user_pass);
		$user->save();
		return redirect(route('user.get.login'))->with(['flash_level'=>'success','flash_messages'=>'Đăng ký thành công! Mời bạn đăng nhập. !']);
	}
	public function getLoginUser(){
		return view('front-end.user.login');
	}
	public function postLoginUser(LoginResquest $request){
		$login = [
			'name'      => $request->user_name,
			'password'  => $request->user_pass,
			'status'	=> 1
		];
		if(Auth::attempt($login)){
			return redirect(url(''));
		}else{
			return redirect(route('user.get.login'))->with(['flash_messages'=>'Tên đăng nhập hoặc mật khẩu không chính xác !','flash_level'=>'error']);
		}
	}
	public function postLogoutUser(){
		Auth::logout();
		return redirect(url(''));
	}
	public function getProfile(){
		$location 			= Location::orderCategory();
		$cate_top 			= Cate::getList(['top'=>1]);
		$cate_home 			= Cate::getList(['home'=>1]);
		$cate_total 		= Cate::getListFollowKey(false);
		$location_total 	= Location::getListFollowKey(false);
		$user_info			= User::getInfoAuth();
		//$post 				= Post::getListNew();
		return view('front-end.user.profile',compact('location','cate_top','cate_home','cate_total','location_total','user_info'));
	}
	public function postProfile(){

	}
	public function updateInfo(Requests\UpdateInfo $requests){
		$avatar = '';
		$user = User::findOrFail(Auth::user()->id);
		//pre($requests);
		if(Input::hasFile('avatar')){
			$avatar 	        = $requests->file('avatar')->getClientOriginalName();
			$requests->file('avatar')->move('public/upload/users/'.strtotime("now").'/',$avatar);
		}

		if($requests->password == ''){
			$user->password = $requests->old_password;
		}else{
			$user->password = $requests->password;
		}
		if($avatar != ''){
			$user->avatar = strtotime("now").'/'.$avatar;
		}
		$user->name = $requests->name;
		$user->fullname = $requests->fullname;
		$user->email = $requests->email;
		$user->phone = $requests->phone;
		$user->save();
		return redirect()->route('user.get.profile')->with(['flash_level'=>'success','flash_messages'=>'Sửa thành công !']);
	}
	public function destroy($id)
	{
		//
	}

}
