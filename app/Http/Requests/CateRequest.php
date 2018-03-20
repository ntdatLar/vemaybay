<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CateRequest extends Request {

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
			'name' => 'required|unique:cates,name|max:40',
			'order' => 'required|integer|min:0|max:999'
		];
	}
	public function messages(){
		return[
			'name.required' 	=> 'Mời bạn nhập Tên !',
			'name.unique'		=> 'Tên danh mục đã tồn tại !',
			'name.max'			=> 'Tên không được quá 40 ký tự',
			'order.required'	=> 'Mời bạn nhập sắp xêp',
			'order.integer'		=> 'Sắp sếp phải là số',
			'order.min'			=> 'Sắp sếp nhỏ nhất là 0',
			'order.max'			=> 'Sắp sếp lớn nhất là 999',
		];
	}

}
