<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class Message extends Model
{
    protected $table='comment';
    public $timestamp=true;
    static public function createFileComment($path,$file,$data){
        if(!file_exists(storage_path("app/".$path)."/".$file)){
            if(is_array($data)){
                $data = json_encode($data);
            }
            $result = Storage::put($path."/".$file, $data);
            return $result;
        }
        return false;
    }
    static public function getContentFile($path,$file,$boolean){
        if($boolean) {
            if (file_exists(storage_path("app/" . $path) . "/" . $file)) {
                $contents = Storage::get($path . "/" . $file);
                return json_decode($contents);
            }
            return false;
        }else{
            if (file_exists($path)) {
                $file_arr = explode("/",$path);
                //$file_name = $file_arr[count($file_arr)-1];
                $file_name = end($file_arr);
                $info_file = $file_arr = explode("_",$file_name);
                //echo $file_name;
                $contents = file_get_contents($path);
                $data = [
                    'id'=>$info_file[0],
                    'time'=>date('d-m-Y H:i:s',$info_file[1]),
                    'content'=>$contents
                ];

                return $data;
            }
            return false;
        }
    }
    static public function getAllfile($path){
        if(is_dir(storage_path("app/".$path))){
            $return = [];
            $files = File::allFiles(storage_path("app/".$path));
            //$content = file_get_contents("/var/www/webico.dev/storage/app/cache/topic/CCLA072817/test.txt");
            $i=0;
            foreach ($files as $key => $file)
            {
                $return[$i] = (string)$file;
                $i++;
            }
            return $return;
        }
        return false;
    }
}
