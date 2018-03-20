<?php namespace App\Http\Controllers\Admin;

use App\banner;
use App\Http\Requests;
use App\Http\Requests\BannerRequest;
use App\Http\Requests\BannerEditRequest;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class BannerController extends Controller {

	public function getList()
	{
		$data = banner::get();
		return view('admin.banner.list',compact('data'));
	}
	/*---------------------------------ADD-*/
	public function getAdd()
	{
		$title = 'Thêm banner';
		$link = route('admin.banner.getAdd');
		return view('admin.banner.form',compact('title','link'));
	}
	public function postAdd(BannerRequest $request)
	{

		if(Input::hasFile('name')){
			$name 	        = $request->file('name')->getClientOriginalName();
			$request->file('name')->move('resources/upload/banner/',$name);
		}
		$status     	= $request->status?$request->status:0;
		$footer       	= $request->footer?$request->footer:0;
		$slider        	= $request->slider?$request->slider:0;
		$top        	= $request->top?$request->top:0;
		$left        	= $request->left?$request->left:0;
		$right        	= $request->right?$request->right:0;

		$item = new banner();

		$item->name          = $name;
		$item->title         = $request->title;
		$item->link     	 = $request->link;
		$item->status        = $status;
		$item->footer        = $footer;
		$item->slider        = $slider;
		$item->top        = $top;
		$item->left        = $left;
		$item->right        = $right;
		$item->save();
		$id = $item->id;
		return redirect()->route('admin.banner.getEdit',$id)->with(['flash_level'=>'success','flash_messages'=>'Thêm thành công !']);
	}
	public function getEdit($id)
	{
		$title = 'Sửa thông tin banner';
		$link = route('admin.banner.getEdit',$id);
		$detail = banner::findOrFail($id);
		return view('admin.banner.form',compact('detail','title','link'));
	}
	public function postEdit(BannerEditRequest $request,$id)
	{
		$item = banner::findOrFail($id);
		$name = '';
		if(Input::hasFile('name')){
			$name 	        = $request->file('name')->getClientOriginalName();
			$request->file('name')->move('resources/upload/banner/',$name);
		}else{
			$name = $item->name;
		}
		$status     	= $request->status?$request->status:0;
		$footer       	= $request->footer?$request->footer:0;
		$slider        	= $request->slider?$request->slider:0;
		$top        	= $request->top?$request->top:0;
		$left        	= $request->left?$request->left:0;
		$right        	= $request->right?$request->right:0;

		$item->name          = $name;
		$item->title         = $request->title;
		$item->link     	 = $request->link;
		$item->status        = $status;
		$item->footer        = $footer;
		$item->slider        = $slider;
		$item->top        = $top;
		$item->left        = $left;
		$item->right        = $right;
		$item->save();
		return redirect()->route('admin.banner.getEdit',$id)->with(['flash_level'=>'success','flash_messages'=>'sửa thành công !']);

	}
	public function Delitem(){
		if(Request::ajax()){
			$id = Request::get('id');
			$item = banner::findOrFail($id);
			$item->delete($id);
			die('Ok');
		}else{
			die(0);
		}
	}
	public function postUpdateItem(){
		if(Request::ajax()){
			$id     = Request::get('id');
			$type   = Request::get('type');
			$value  = Request::get('val');
			$item   = banner::findOrFail($id);
			$item->$type = $value;
			$item->save();
			die('Ok');
		}else{
			die(0);
		}
	}

}
