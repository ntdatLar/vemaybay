<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table='location';
    public $timestamp=true;
    static public function getList(){

        $location = Location::where('type','<>','Phư�?ng')->where('type','<>','Xã')->where('type','<>','Thị Trấn')
            ->orderBy('name','ASC')->get();
        if($location){
            return $location;
        }else{
            return null;
        }
    }
    static public function getListFollowParent($parent_id = false){
        $parent = '00';
        if($parent_id){
           $parent = $parent_id;
        }
        $location = Location::where(['parent_id'=>$parent])->orderBy('name','ASC')->get()->toArray();
        if($location){
            return $location;
        }else{
            return null;
        }
    }
    static public function orderCategory(){
        $parent = Location::getListFollowParent('00');
        $i=0;
        foreach ($parent as $item){
            $parent[$i]['child'] = Location::getListFollowParent($item['code']);
            $i++;
        }
        return $parent;
    }
    static public function getSelectFollowParent($parent_id = false,$wheres = false){
        $parent = 0;
        if($parent_id){
            $parent = $parent_id;
        }
        if(!$wheres){
            $cate = Location::select('name','code','id','name','parent_id')->where(['parent_id'=>$parent])->orderBy('name','ASC')->get()->toArray();
        }else {
            $where = ['parent_id'=>$parent];
            $where = array_merge($where,$wheres);
            $cate = Location::select('id','code','name','parent_id')->where($where)->orderBy('name', 'ASC')->get()->toArray();
        }
        if($cate){
            return $cate;
        }else{
            return null;
        }
    }
    static public function getListFollowKey($wheres = false){
        $where = [
        ];
        if(!empty($wheres) && is_array($wheres) && $wheres != null){
            $wheres = array_merge($where,$wheres);
        }else{
            $wheres = $where;
        }
        $parent = Location::getSelectFollowParent('00',$wheres);
        $i=0;
        $dataz = null;
        foreach ($parent as $item){
            $dataz[$item['id']] = $item;
            $dataz[$item['id']]['child'] = Location::getSelectFollowParent($item['code'],$where);
            $i++;
        }
        return $dataz;
    }
    static public function getSingleFollowCode(string $code){
        if(!$code){
            return null;
        }
        $where = [
            'id'=>$code
        ];
        $dataz = Location::where($where)->first();
        return $dataz;
    }

}
