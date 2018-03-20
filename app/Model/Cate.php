<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class Cate extends Model {
    protected $table='cates';
    public $timestamp=true;
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    public function products()
    {
        return $this->hasMany('App\Product');
    }
    static public function getListFollowParent($parent_id = false,$wheres = false){
        $parent = 0;
        if($parent_id){
            $parent = $parent_id;
        }
        if(!$wheres){
            $cate = Cate::where(['parent_id'=>$parent])->orderBy('order','ASC')->get()->toArray();
        }else {
            $where = ['parent_id'=>$parent];
            $where = array_merge($where,$wheres);
            $cate = Cate::where($where)->orderBy('order', 'ASC')->get()->toArray();
        }
        if($cate){
            return $cate;
        }else{
            return null;
        }
    }
    static public function getList($wheres = false){
        $where = [
            'status'=>1
        ];
        if(!empty($wheres) && is_array($wheres) && $wheres != null){
            $wheres = array_merge($where,$wheres);
        }else{
            $wheres = $where;
        }
        $parent = Cate::getListFollowParent(0,$wheres);
        $i=0;
        foreach ($parent as $item){
            $parent[$i]['child'] = Cate::getListFollowParent($item['id'],$where);
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
            $cate = Cate::select('name','id','parent_id')->where(['parent_id'=>$parent])->orderBy('order','ASC')->get()->toArray();
        }else {
            $where = ['parent_id'=>$parent];
            $where = array_merge($where,$wheres);
            $cate = Cate::select('name','id','parent_id')->where($where)->orderBy('order', 'ASC')->get()->toArray();
        }
        if($cate){
            return $cate;
        }else{
            return null;
        }
    }
    static public function getListFollowKey($wheres = false){
        $where = [
            'status'=>1
        ];
        if(!empty($wheres) && is_array($wheres) && $wheres != null){
            $wheres = array_merge($where,$wheres);
        }else{
            $wheres = $where;
        }
        $parent = Cate::getSelectFollowParent(0,$wheres);
        $i=0;
        $dataz = null;
        foreach ($parent as $item){
            $dataz[$item['id']] = $item;
            $dataz[$item['id']]['child'] = Cate::getSelectFollowParent($item['id'],$where);
            $i++;
        }
        return $dataz;
    }

    static public function getSingleFollowSlug(string $slug){
        if(!$slug){
            return null;
        }
        $where = [
            'alias'=>(string)$slug
        ];
        $dataz = Cate::where($where)->first();
        return $dataz;
    }
}
