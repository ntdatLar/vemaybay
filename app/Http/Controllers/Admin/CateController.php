<?php namespace App\Http\Controllers\Admin;
use App\Http\Requests;
use App\Http\Requests\CateRequest;
use App\Http\Requests\CateEditRequest;
use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use Request;
use App\Cate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
class CateController extends Controller {

	public function getList()
	{
		$cate_product   = Cate::where(['type'=>3])->get();
		$cate_post      = Cate::where(['type'=>2])->get();
		$cate_page      = Cate::where(['type'=>1])->get();
		return view('admin.cate.list',compact('cate_product','cate_post','cate_page'));
	}
	/*------------------------------------------------------*/
	public function getAdd()
	{
		$title = 'Thêm mới danh mục';
		$link_form = route("admin.cte.getAdd");
		$data['cate_product'] 	= Cate::where(['type'=>3])->get()->toArray();
		$data['cate_post'] 		= Cate::where(['type'=>2])->get()->toArray();
		$data['cate_page'] 		= Cate::where(['type'=>1])->get()->toArray();
		return view('admin.cate.form',compact('title','data','link_form'));
	}
	public function postAdd(CateRequest $request)
	{
        $avatar = '';
        if(Input::hasFile('avatar')){
            $avatar 	        = $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move('resources/upload/cate/',$avatar);
        }
		$cate                   = new Cate();
        $cate->name             = $request->name;
        $cate->alias            = replace($request->name);
        $cate->order            = $request->order;
        $cate->status           = $request->status;
        $cate->type             = $request->type;
        $cate->top              = $request->top;
        $cate->home             = $request->home;
        $cate->footer           = $request->footer;
        $cate->parent_id        = $request->parent_id;
        $cate->keywords         = $request->keywords;
        $cate->description      = $request->description;
        $cate->avatar           = $avatar;
        $cate->save();
        $id                     = $cate->id;
        return redirect()->route('admin.cte.getEdit',$id)->with(['flash_level'=>'success','flash_messages'=>'Thêm mới thành công.']);
	}
	/*-------------------------------------------------------*/
	public function getEdit($id)
	{
        $detail = Cate::findOrFail($id);
		$title = 'Sửa danh mục';
		$link_form = route("admin.cte.getEdit",$id);
		$data['cate_product'] 	= Cate::where(['type'=>3])->get()->toArray();
		$data['cate_post'] 		= Cate::where(['type'=>2])->get()->toArray();
		$data['cate_page'] 		= Cate::where(['type'=>1])->get()->toArray();
		return view('admin.cate.form',compact('title','data','link_form','detail'));
	}
	public function postEdit(CateEditRequest $request,$id)
	{   
		$cate                   = Cate::find($id);
        if(Input::hasFile('avatar')){
            $avatar 	        = $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move('resources/upload/cate/',$avatar);
        }else{
            $avatar             = $cate->avatar;
        }
        $cate->name             = $request->name;
        $cate->alias            = replace($request->name);
        $cate->order            = $request->order;
        $cate->status           = $request->status;
        $cate->type             = $request->type;
        $cate->top              = $request->top;
        $cate->home             = $request->home;
        $cate->footer           = $request->footer;
        $cate->parent_id        = $request->parent_id;
        $cate->keywords         = $request->keywords;
        $cate->description      = $request->description;
        $cate->avatar           = $avatar;
        $cate->save();
        $id                     = $cate->id;
        return redirect()->route('admin.cte.getEdit',$id)->with(['flash_level'=>'success','flash_messages'=>'Sửa thành công.']);
	}
	/*-------------------------------------------------------*/
	public function postDelItem()
	{
        if(Request::ajax()){
            $id = Request::get('id');
            $cate = Cate::findOrFail($id);
            $cate->delete($id);

            $cate_child = Cate::where('parent_id',$id)->get();
            foreach ($cate_child as $item) {
                $cate_c = Cate::find($item->id);
                $cate_c->parent_id = 0;
                $cate_c->save();
            }
            die('Ok');
        }else{
            die(0);
        }
	}
	public function postUpdateItem()
	{
        if(Request::ajax()){
            $id     = Request::get('id');
            $type   = Request::get('type');
            $value  = Request::get('val');
            $cate   = Cate::findOrFail($id);
            $cate->$type = $value;
            $cate->save();
            die('Ok');
        }else{
            die(0);
        }
	}
	public function upOrder()
	{
        if(Request::ajax()){
            $id     = Request::get('id');
            $type   = Request::get('type');
            $value  = Request::get('val');
            if($value > 0 && $value < 999) {
                $cate = Cate::findOrFail($id);
                $cate->$type = $value;
                $cate->save();
                die('Ok');
            }else{
                die(0);
            }
        }else{
            die(0);
        }
	}
	/*-------------------------------------------------------*/
	public function destroy($id)
	{
		//
	}

}
