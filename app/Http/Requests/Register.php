<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class Register extends Request
{
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
			'name'          => 'required|unique:users,name|max:50|min:6|regex:/[a-zA-Z0-9_]{6,50}/',
			'user_email'    => 'required|unique:users,email|email',
			'user_pass'     => 'required|max:50|min:6',
			'user_repass'   => 'required|same:user_pass',
		];
	}
	public function messages(){
		return[
			'name.required' 	    => 'Bạn chưa nhập tên đăng nhập !',
			'name.unique' 	        => 'Tên đăng nhập đã tồn tại !',
			'name.max' 	            => 'Tên dăng nhập không được quá 50 ký tự !',
			'name.min' 	            => 'Tên dăng nhập it nhất là 6 ký tự !',
			'name.regex' 	        => 'Tên dăng nhập chứa những ký tự không hợp lệ chỉ chấp nhật các ký tự từ alpha và "_" !',

			'user_email.required' 	=> 'Bạn chưa nhập địa chỉ email !',
			'user_email.unique' 	=> 'Địa chỉ email của bạn đã tồn tại !',

			'user_pass.required' 	=> 'Bạn chưa nhập mật khẩu !',
			'user_pass.max' 	    => 'Mật khẩu không được quá 50 ký tự !',
			'user_pass.min' 	    => 'Mật khẩu it nhất là 6 ký tự !',

			'user_repass.required' 	=> 'Bạn chưa nhập lại mật khẩu !',
			'user_repass.same' 	    => 'Nhập lại mật khẩu không đúng !',
		];
	}
}
