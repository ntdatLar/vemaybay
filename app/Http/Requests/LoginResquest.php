<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class LoginResquest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'username'          	=> 'required|max:50|min:6|regex:/[a-zA-Z0-9_]{6,50}/',
			'userpass'     		=> 'required|max:50|min:6',
		];
	}
	public function messages(){
		return[
			'username.required' 	=> 'Bạn chưa nhập tên đăng nhập !',
			'username.max' 	    => 'Tên dăng nhập không được quá 50 ký tự !',
			'username.min' 	    => 'Tên dăng nhập it nhất là 6 ký tự !',
			'username.regex' 	    => 'Tên dăng nhập chứa những ký tự không hợp lệ chỉ chấp nhật các ký tự từ alpha và "_" !',

			'userpass.required' 	=> 'Bạn chưa nhập mật khẩu !',
			'userpass.max' 	    => 'Mật khẩu không được quá 50 ký tự !',
			'userpass.min' 	    => 'Mật khẩu it nhất là 6 ký tự !',
		];
	}

}
