<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Setup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SetupController extends Controller {

	public function getInfo(){
		$detail = Setup::where('id',1)->get()->first();
		$title = 'Cài đặt thông tin';
		$link  = route('admin.stp.getInfo');
		return view('admin.setup.info',compact('detail','title','link'));
	}
	public function postInfo(Request $request){
		$item = Setup::findOrFail(1);
		if(Input::hasFile('logo')){
			$logo 	        = $request->file('logo')->getClientOriginalName();
			$request->file('logo')->move('resources/upload/theme/',$logo);
		}else{
			$logo = $item->logo;
		}
		$item->name = $request->name;
		$item->logo = $logo;
		$item->title = $request->title;
		$item->description = $request->description;
		$item->keywords = $request->keywords;
		$item->email = $request->email;
		$item->phone = $request->phone;
		$item->hotline = $request->hotline;
		$item->address = $request->address;
		$item->maps = $request->maps;
		$item->facebook = $request->facebook;
		$item->skype = $request->skype;
		$item->skype = $request->skype;
		$item->google = $request->google;
		$item->twitter = $request->twitter;
		$item->youtube = $request->youtube;
		$item->facebookF = $request->facebookF;
		$item->save();
		return redirect()->route('admin.stp.getInfo')->with(['flash_level'=>'success','flash_messages'=>'Sửa thành công !']);
	}
	public function destroy($id)
	{
		//
	}

}
