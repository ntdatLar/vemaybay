<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Request;


class UserController extends Controller {

	public function getList(){
		$data = User::where('level','=',0)->get();
		$title = "Danh sách quản trị viên";
		return view('admin.user.list',compact('data','title'));
	}
	public function getAdd()
	{
		$title = 'Thêm thành viên';
		$link = route('admin.usr.getAdd');
		return view('admin.user.form',compact('title','link'));
	}
	public function postAdd(UserRequest $request)
	{
		$item 						= new User();
		$status     				= $request->status?$request->status:0;
		$item->name 				= $request->name;
		$item->email 				= $request->email;
		$item->fullname 			= $request->fullname;
		$item->password 			= Hash::make($request->password);
		$item->status 				= $status;
		$item->level 				= 0;
		$item->remember_token 		= $request->_token;
		$item->save();
		return redirect()->route('admin.usr.getEdit',$item->id)->with(['flash_level'=>'success','flash_messages'=>'Thêm thành công !']);
	}
	/*-----------------------function edit item*/
	public function getEdit($id){
		$id = (int)$id;
		$detail = User::findOrFail($id);
		$title = "Sửa thành viên";
		$link = route('admin.usr.getEdit',$id);
		return view('admin.user.form',compact('detail','title','link'));
	}
	public function postEdit(UserEditRequest $request,$id){
		$item 						= User::findOrFail($id);
		$pass 						= '';
		if($request->password != ''){
			$pass = Hash::make($request->password);
		}else{
			$pass = $item->password;
		}
		$status     				= $request->status?$request->status:0;
		$item->name 				= $request->name;
		$item->email 				= $request->email;
		$item->fullname 			= $request->fullname;
		$item->password 			= $pass;
		$item->status 				= $status;
		$item->level 				= 0;
		$item->remember_token 		= $request->_token;
		$item->save();
		return redirect()->route('admin.usr.getEdit',$item->id)->with(['flash_level'=>'success','flash_messages'=>'Thêm thành công !']);
	}
	public function Delitem(){
		if(Request::ajax()){
			$id = Request::get('id');
			$item = User::findOrFail($id);
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
			$item   = User::findOrFail($id);
			$item->$type = $value;
			$item->save();
			die('Ok');
		}else{
			die(0);
		}
	}

}
