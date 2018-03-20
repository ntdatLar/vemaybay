<?php namespace App\Http\Controllers\Admin;

use App\Cate;
use App\Http\Requests;
use App\Http\Requests\PostAddRequest;
use App\Http\Requests\PostEditRequest;
use App\Http\Controllers\Controller;

use App\Post;
//use Illuminate\Http\Request;
use Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class PostController extends Controller {
	protected $_theme	= 'admin.post';
	protected $_route	= 'admin.pst';
	public function getList()
	{
		$data = Post::get();
		return view($this->_theme.'.list',compact('data'));
	}
	/*---------------------------------ADD-*/
	public function getAdd()
	{
		$title = 'Thêm bài viết';
		$link = route('admin.pst.getAdd');
		$cate = Cate::where('type',2)->get()->toArray();
		return view($this->_theme.'.form',compact('cate','title','link'));
	}
	public function postAdd(PostAddRequest $request)
	{
		if(Input::hasFile('avatar')){
			$avatar 	        = $request->file('avatar')->getClientOriginalName();
			$request->file('avatar')->move('resources/upload/post/',$avatar);
		}
		$status     = $request->status?$request->status:0;
		$home       = $request->home?$request->home:0;
		$new        = $request->new?$request->new:0;
		$item = new Post();

		$item->name          = $request->name;
		$item->alias         = replace($request->name);
		$item->cate_id       = $request->cate_id;
		$item->intro         = $request->intro;
		$item->content       = $request->content;
		$item->status        = $status;
		$item->home          = $home;
		$item->new           = $new;
		$item->keywords      = $request->keywords;
		$item->description   = $request->description;
		$item->avatar        = $avatar;
		$item->save();
		return redirect()->route($this->_route.'.getEdit',$item->id)->with(['flash_level'=>'success','flash_messages'=>'Thêm thành công !']);
	}
	/*---------------------------------EDIT-*/
	public function getEdit($id)
	{
		$title = 'Sửa thông tin bài viết';
		$link = route('admin.pst.getEdit',$id);
		$detail = Post::findOrFail($id);
		$cate = Cate::where('type',2)->get()->toArray();
		return view($this->_theme.'.form',compact('detail','cate','title','link'));
	}
	public function postEdit(PostEditRequest $request,$id)
	{
		$item = Post::findOrFail($id);
		$avatar = '';
		if(Input::hasFile('avatar')){
			$avatar 	        = $request->file('avatar')->getClientOriginalName();
			$request->file('avatar')->move('resources/upload/post/',$avatar);
		}else{
			$avatar = $item->avatar;
		}

		$status     = $request->status?$request->status:0;
		$home       = $request->home?$request->home:0;
		$new        = $request->hot?$request->new:0;

		$item->name          = $request->name;
		$item->alias         = replace($request->name);
		$item->cate_id       = $request->cate_id;
		$item->intro         = $request->intro;
		$item->content       = $request->content;
		$item->status        = $status;
		$item->home          = $home;
		$item->new           = $new;
		$item->keywords      = $request->keywords;
		$item->description   = $request->description;
		$item->avatar         = $avatar;
		$item->save();
		return redirect()->route($this->_route.'.getEdit',$item->id)->with(['flash_level'=>'success','flash_messages'=>'Sửa thành công !']);
	}
	public function Delitem(){
		if(Request::ajax()){
			$id = Request::get('id');
			$item = Post::findOrFail($id);
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
			$item   = Post::findOrFail($id);
			$item->$type = $value;
			$item->save();
			die('Ok');
		}else{
			die(0);
		}
	}
	public function destroy($id)
	{
		//
	}

}
