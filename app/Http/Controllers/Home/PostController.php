<?php namespace App\Http\Controllers\Home;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Cate;
use App\Model\Location;
use App\Model\Post;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Request;

class PostController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getPostLocation($name,$code,$id,$parent_id){
		echo $id;
		$location 			= Location::orderCategory();
		$cate_top 			= Cate::getList(['top'=>1]);
		$cate_home 			= Cate::getList(['home'=>1]);
		$cate_total 		= Cate::getListFollowKey(false);
		$location_total 	= Location::getListFollowKey(false);
		$post 				= Post::getListFCodeLocation($code);
	    return view('front-end.post.listLocation',compact('location','cate_top','cate_home','cate_total','location_total','post'));
	}
	public function getPostLocations($id,$name){
		echo $id;
		//echo $name;
		//die;
		$location 			= Location::orderCategory();
		$cate_top 			= Cate::getList(['top'=>1]);
		$cate_home 			= Cate::getList(['home'=>1]);
		$cate_total 		= Cate::getListFollowKey(false);
		$location_total 	= Location::getListFollowKey(false);
		$post 				= Post::getListFCodeLocation($id);
	    return view('front-end.post.listLocation',compact('location','cate_top','cate_home','cate_total','location_total','post'));
    }
	public function getPostCategory($slug){
		//$id_cate
		//$post = Post::getList(false);
		//echo $slug;
		$location 			= Location::orderCategory();
		$cate_top 			= Cate::getList(['top'=>1]);
		$cate_home 			= Cate::getList(['home'=>1]);
		$cate_total 		= Cate::getListFollowKey(false);
		$location_total 	= Location::getListFollowKey(false);
		$post 				= Post::getListFSlug($slug);
	    return view('front-end.post.listCate',compact('location','cate_top','cate_home','cate_total','location_total','post'));
    }
	public function getPostHot(){
		$post = Post::getList(false);
	    return view('front-end.post.listLocation');
    }
	public function getSinglePost(){
		$location 			= Location::orderCategory();
		$cate_top 			= Cate::getList(['top'=>1]);
		$cate_home 			= Cate::getList(['home'=>1]);
		$cate_total 		= Cate::getListFollowKey(false);
		$location_total 	= Location::getListFollowKey(false);
		$post 				= Post::getListNew();
		//die('123');
		return view('front-end.post.single',compact('location','cate_top','cate_home','cate_total','location_total','post'));
	}
	public function index()
	{
		//
	}
	public function putPost(){
		if(Request::ajax()){
			/*$location_parent 		= Request::get('location_parent');
			$location_child 		= Request::get('location_child');
			$cate_parent 			= Request::get('cate_parent');
			$cate_child 			= Request::get('cate_child');
			$content_post 			= Request::get('content_post');
			$files 					= json_encode(Request::get('files'));*/
			$id = Post::insertData(Input::all());
			//pre($id);
			if($id){
				die(1);
			}else{
				die(0);
			}
			//$location_parent = Request::get('data');
			//pre($_POST);
			/*$str_data = Request::get('data');
			$str_file = Request::get('submit');
			$arr_data = explode('&',$str_data);
			$arr_file = explode('&',$str_file);
			pre($arr_data);
			pre($arr_file);*/
		}else{
			$result =['status'=>0];
			die($result);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
