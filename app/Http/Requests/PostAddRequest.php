<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostAddRequest extends Request {

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
			'name' => 'required|unique:posts,name|max:200',
			'avatar' => 'required|image',
			'intro' => 'required',
		];
	}
	public function messages(){
		return[
			'name.required' 	=> 'Mời bạn nhập tiêu đề !',
			'name.unique'		=> 'Tiêu đề đã tồn tại !',
			'name.max'			=> 'Tiêu không đươc quá 100 ký tự',
			'avatar.required'	=> 'Bạn chưa chọn ảnh',
			'avatar.image'		=> 'File ảnh chưa được hỗ trợ',
			'intro.required'	=> "Bạn chưa nhập giới thiệu"
		];
	}

}
