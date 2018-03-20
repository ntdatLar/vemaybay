<?php namespace App\Http\Controllers\Home;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Request;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ImgController extends Controller {
	public function uploadImg(){

		//pre($_FILES);
		if(Request::ajax()){
			$file     = Request::file('file');
			if($file){
				$avatar 	        = Request::file('file')->getClientOriginalName();
				$path_s				= strtotime("now");
				$path 				= config('define.upload_url.img_post')."/".$path_s;
				//ImgController::createFileImg();
				Request::file('file')->move($path,$avatar);
				$result =[
					'status'=>1,
					'name'=>(string)$path_s.'/'.$avatar
				];
				die(json_encode($result));
			}else{
				$result =['status'=>0];
				die($result);
			}
		}else{
			$result =['status'=>1];
			die($result);
		}
		/*if(Input::hasFile('file')){
			$avatar 	        = $request->file('file')->getClientOriginalName();
			$path 				= config('define.upload_url.img_post');
			$request->file('file')->move($path,$avatar);
		}*/
	}
	/*static public function createFileImg($path,$file,$data){
		if(!file_exists(storage_path("app/".$path)."/".$file)){
			if(is_array($data)){
				$data = json_encode($data);
			}
			$result = Storage::put($path."/".$file, $data);
			return $result;
		}
		return false;
	}*/
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
