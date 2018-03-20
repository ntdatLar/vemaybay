<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class BannerRequest extends Request {

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
			'title' 		=> 'required|min:10|max:140',
			'link' 			=> 'required|url',
			'name' 			=> 'required|image',
		];
	}
	public function messages(){
		return[
			'title.required' 	=> 'Bạn chưa nhập tiêu đề!',
			'title.min' 		=> 'Tiều đề phải lớn hơn 10 ký tự!',
			'title.max' 		=> 'Tiều đề phải nhỏ hơn 140 ký tự!',
			'link.required' 	=> 'Bạn chưa nhập link đích!',
			'link.url' 		=> 'Link đích không đúng định dạng!',
			'name.required' 	=> 'Bạn chưa chọn ảnh!',
			'name.image' 		=> 'File ảnh chưa được hỗ trợ!',
		];
	}

}
