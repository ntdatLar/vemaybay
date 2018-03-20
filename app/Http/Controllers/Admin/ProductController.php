<?php namespace App\Http\Controllers\Admin;

use App\Image;
use App\Product;
use App\Cate;
use App\Http\Requests;
use App\Http\Requests\ProductAddRequest;
use App\Http\Requests\ProductEditRequest;
use App\Http\Controllers\Controller;
use Request;


//use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getList()
	{
        $product = Product::get();
		return view('admin.product.list',compact('product'));
	}
    /*---------------------------------ADD-*/
	public function getAdd()
	{
        $title = 'Thêm sản phẩm';
        $link = route('admin.pdt.getAdd');
	    $cate = Cate::where('type',3)->get()->toArray();
		return view('admin.product.form',compact('cate','title','link'));
	}
	public function postAdd(ProductAddRequest $request)
	{
        if(Input::hasFile('avatar')){
            $avatar 	        = $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move('resources/upload/product/',$avatar);
        }
        $status     = $request->status?$request->status:0;
        $home       = $request->home?$request->home:0;
        $hot        = $request->hot?$request->hot:0;
        $intro = json_encode([0=>$request->titleIntro,1=>$request->textIntro]);
	    $pro = new Product();

	    $pro->name          = $request->name;
	    $pro->alias         = replace($request->name);
	    $pro->num           = $request->num;
	    $pro->price_old     = $request->price_old;
	    $pro->percent       = $request->percent;
	    $pro->price_new     = $request->price_new;
	    $pro->cate_id       = $request->cate_id;
	    $pro->intro         = $intro;
	    $pro->content       = $request->content;
	    $pro->status        = $status;
	    $pro->home          = $home;
	    $pro->hot           = $hot;
	    $pro->keywords      = $request->keywords;
	    $pro->description   = $request->description;
	    $pro->avatar        = $avatar;
        $pro->save();
        $p_id = $pro->id;
        if(Input::hasFile('images')){
            foreach(Input::file('images') as $file){
                $pImages    = new Image();
                if(isset($file)) {
                    $pImages->name = $file->getClientOriginalName();
                    $pImages->product_id = $p_id;
                    $file->move('resources/upload/product/', $file->getClientOriginalName());
                    $pImages->save();
                }
            }
        }
        return redirect()->route('admin.pdt.getEdit',$p_id)->with(['flash_level'=>'success','flash_messages'=>'Thêm thành công !']);
	}
	/*---------------------------------EDIT-*/
	public function getEdit($id)
    {
        $title = 'Sửa thông tin sản phẩm';
        $link = route('admin.pdt.getEdit',$id);
        $detail = Product::findOrFail($id);
        $pImg = Product::findOrFail($id)->pimages;
        $cate = Cate::where('type',3)->get()->toArray();
        return view('admin.product.form',compact('detail','cate','title','link','pImg'));
    }
    public function postEdit(ProductEditRequest $request,$id)
    {
        $pro = Product::findOrFail($id);
        $avatar = '';
        if(Input::hasFile('avatar')){
            $avatar 	        = $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move('resources/upload/product/',$avatar);
        }else{
            $avatar = $pro->avatar;
        }

        $status     = $request->status?$request->status:0;
        $home       = $request->home?$request->home:0;
        $hot        = $request->hot?$request->hot:0;
        $intro = json_encode([0=>$request->titleIntro,1=>$request->textIntro]);

        $pro->name          = $request->name;
        $pro->alias         = replace($request->name);
        $pro->num           = $request->num;
        $pro->price_old     = $request->price_old;
        $pro->percent       = $request->percent;
        $pro->price_new     = $request->price_new;
        $pro->cate_id       = $request->cate_id;
        $pro->intro         = $intro;
        $pro->content       = $request->content;
        $pro->status        = $status;
        $pro->home          = $home;
        $pro->hot           = $hot;
        $pro->keywords      = $request->keywords;
        $pro->description   = $request->description;
        $pro->avatar         = $avatar;
        $pro->save();
        $p_id = $pro->id;
        if(Input::hasFile('images')){
            foreach(Input::file('images') as $file){
                $pImages    = new Image();
                if(isset($file)) {
                    $pImages->name = $file->getClientOriginalName();
                    $pImages->product_id = $p_id;
                    $file->move('resources/upload/product/', $file->getClientOriginalName());
                    $pImages->save();
                }
            }
        }
        return redirect()->route('admin.pdt.getEdit',$pro->id)->with(['flash_level'=>'success','flash_messages'=>'Sửa thành công !']);
    }
    public function getDelImg(){
        if(Request::ajax()){
            $id = Request::get('id');
            $cate = Image::findOrFail($id);
            $cate->delete($id);
            die('Ok');
        }else{
            die(0);
        }
    }
    public function Delitem(){
        if(Request::ajax()){
            $id = Request::get('id');
            $item = Product::findOrFail($id);
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
            $item   = Product::findOrFail($id);
            $item->$type = $value;
            $item->save();
            die('Ok');
        }else{
            die(0);
        }
    }
    public function destroy($id)
	{
	}

}
