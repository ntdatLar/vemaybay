<?php

namespace App\Http\Controllers\__Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests;
use App\Http\Requests\Register;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    public function getRegister(){
        return view("user.register");
    }
    public function postRegister(Register $request){
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
        return redirect(url(""))->with(['flash_level'=>'success','flash_messages'=>'Chúc mừng bạn tạo tài khoản thành công !']);

        //pre($request);
        //return view("user.register");
    }
}
