<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateInfo extends Request
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
			'name'          => 'required|max:50|min:6|regex:/[a-zA-Z0-9_]{6,50}/',
			'pass'     		=> '|max:50|min:6',
		];
	}
	public function messages(){
		return[
			'name.required' 	    => 'Bạn chưa nhập tên đăng nhập !',

			'name.max' 	            => 'Tên dăng nhập không được quá 50 ký tự !',
			'name.min' 	            => 'Tên dăng nhập it nhất là 6 ký tự !',
			'name.regex' 	        => 'Tên dăng nhập chứa những ký tự không hợp lệ chỉ chấp nhật các ký tự từ alpha và "_" !',

			'email.required' 	=> 'Bạn chưa nhập địa chỉ email !',

			'pass.max' 	    => 'Mật khẩu không được quá 50 ký tự !',
			'pass.min' 	    => 'Mật khẩu it nhất là 6 ký tự !',
		];
	}
}
