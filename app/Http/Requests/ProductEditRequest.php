<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductEditRequest extends Request {

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
			'name' => 'required|max:100',
			'num' => 'required|integer|min:0|max:999',
			'avatar' => 'image'
		];
	}
	public function messages(){
		return[
			'name.required' 	=> 'Mời bạn nhập Tên !',
			'name.max'			=> 'Tên không được quá 100 ký tự',
			'num.required'	    => 'Mời bạn nhập số lượng',
			'num.integer'		=> 'Số lượng phải là số',
			'num.min'			=> 'Số lượng nhỏ nhất là 0',
			'num.max'			=> 'Số lượng lớn nhất là 999',
			'avatar.required'	=> 'Bạn chưa chọn ảnh',
			'avatar.image'	=> 'Đuôi ảnh chưa được hỗ trợ'
		];
	}

}
