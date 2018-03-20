<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class BannerEditRequest extends Request {

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
			'name' 			=> 'image',
		];
	}
	public function messages(){
		return[
			'title.required' 	=> 'B?n ch?a nh?p tiêu ??!',
			'title.min' 		=> 'Ti?u ?? ph?i l?n h?n 10 ký t?!',
			'title.max' 		=> 'Ti?u ?? ph?i nh? h?n 140 ký t?!',
			'link.required' 	=> 'B?n ch?a nh?p link ?ích!',
			'link.url' 		=> 'Link ?ích không ?úng ??nh d?ng!',
			'name.image' 		=> 'File ?nh ch?a ???c h? tr?!',
		];
	}

}
