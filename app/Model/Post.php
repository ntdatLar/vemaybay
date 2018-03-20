<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
use Illuminate\Support\Facades\DB;

class Post extends Model {
    protected $table='posts';
    public $timestamp=true;
    const limit =1;
    public function cate()
    {
        return $this->belongstoMany('App\Cate');
    }
    static public function getList($wheres = false){
        echo self::limit;
        die;
        $where = [['status', '=', '1']];
        if(!empty($wheres) && is_array($wheres) && $wheres != null){
            $where = array_merge($where,$wheres);
        }
        $data = Post::where($where)
                ->orderBy('id','DESC')
                ->paginate(self::limit);
        return $data;
    }
    static public function insertData($request){
        //echo $request['content_post'];
        //echo htmlspecialchars($request['content_post']);
        //pre($request);
        $item = new Post();
        $item->user_id          = Auth::user()->id;
        $item->location_id      = $request['location_parent'];
        $item->l_child          = $request['location_child'];
        $item->alias            = strtotime("now");
        $item->status           = 1;
        $item->cate_id          = $request['cate_parent'];
        $item->c_child          = $request['cate_child'];
        $item->content          = trim($request['content_post']);
        $item->intro            = (string)json_encode($request['files']);
        $item->save();
        return $item->id;
    }
    static public function getRow($id){
        //echo $request['content_post'];
        //echo htmlspecialchars($request['content_post']);
        //pre($request);
        $item = Post::findOrFail((int)$id);
        if($item){
            return $item;
        }else{
            return false;
        }
    }
    static public function getListNew(){
        $where = ['p.status'=>1];
        $data = DB::table('posts as p')
            ->join('location as l', 'l.id', '=', 'p.location_id')
            ->join('location as lc', 'lc.id', '=', 'p.l_child')
            ->join('cates as c', 'c.id', '=', 'p.cate_id')
            ->join('cates as cc', 'cc.id', '=', 'p.c_child')
            ->join('users as u', 'u.id', '=', 'p.user_id')
            ->select('p.id as pid','p.location_id as p_local',
                'p.alias as p_alias','p.intro as p_intro',
                'p.content as p_content','p.created_at as p_created_at',
                'u.id as u_id','u.fullname as u_fullname','u.name as u_name','u.avatar as u_avatar',
                'l.name as l_name','l.id as l_id','l.code as l_code','l.parent_id as l_parent',
                'lc.name as lc_name','lc.id as lc_id','lc.code as lc_code','lc.parent_id as lc_parent',
                'c.name as c_name','c.id as c_id','c.alias as c_alias',
                'cc.name as cc_name','cc.id as cc_id','cc.alias as cc_alias'
            )
            ->where($where)
            ->orderBy('p.id','DESC')
            ->paginate(self::limit);
            //->limit(10)->get();
        return $data;
    }
    /**
     * get follow slug category
     */
    static public function getListFSlug($slug = false){
        if(!$slug){
            return null;
        }
        $catez = Cate::getSingleFollowSlug($slug);
        if(!$catez){
            return null;
        }
        $id_cate = $catez->id;
        $where = ['p.c_child' => $id_cate ];
        $where_or = [
            'p.cate_id' => $id_cate
        ];
        $data = DB::table('posts as p')
            ->join('location as l', 'l.id', '=', 'p.location_id')
            ->join('location as lc', 'lc.id', '=', 'p.l_child')
            ->join('cates as c', 'c.id', '=', 'p.cate_id')
            ->join('cates as cc', 'cc.id', '=', 'p.c_child')
            ->join('users as u', 'u.id', '=', 'p.user_id')
            ->select('p.id as pid','p.location_id as p_local',
                'p.alias as p_alias','p.intro as p_intro',
                'p.content as p_content','p.created_at as p_created_at',
                'u.id as u_id','u.fullname as u_fullname','u.name as u_name','u.avatar as u_avatar',
                'l.name as l_name','l.id as l_id','l.code as l_code','l.parent_id as l_parent',
                'lc.name as lc_name','lc.id as lc_id','lc.code as lc_code','lc.parent_id as lc_parent',
                'c.name as c_name','c.id as c_id','c.alias as c_alias',
                'cc.name as cc_name','cc.id as cc_id','cc.alias as cc_alias'
            )
            ->where($where)
            ->orWhere($where_or)
            ->orderBy('p.id','DESC')
            ->paginate(self::limit);
        return $data;
    }

    /**
     * get follow code location
     */
    static public function getListFCodeLocation($code = false){
        if(!$code){
            return null;
        }
        $location = Location::getSingleFollowCode($code);
        if(!$location){
            return null;
        }
        $id_location = $location->id;
        $where = ['p.l_child' => $id_location ];
        $where_or = [
            'p.location_id' => $id_location
        ];
        $data = DB::table('posts as p')
            ->join('location as l', 'l.id', '=', 'p.location_id')
            ->join('location as lc', 'lc.id', '=', 'p.l_child')
            ->join('cates as c', 'c.id', '=', 'p.cate_id')
            ->join('cates as cc', 'cc.id', '=', 'p.c_child')
            ->join('users as u', 'u.id', '=', 'p.user_id')
            ->select('p.id as pid','p.location_id as p_local',
                'p.alias as p_alias','p.intro as p_intro',
                'p.content as p_content','p.created_at as p_created_at',
                'u.id as u_id','u.fullname as u_fullname','u.name as u_name','u.avatar as u_avatar',
                'l.name as l_name','l.id as l_id','l.code as l_code','l.parent_id as l_parent',
                'lc.name as lc_name','lc.id as lc_id','lc.code as lc_code','lc.parent_id as lc_parent',
                'c.name as c_name','c.id as c_id','c.alias as c_alias',
                'cc.name as cc_name','cc.id as cc_id','cc.alias as cc_alias'
            )
            ->where($where)
            ->orWhere($where_or)
            ->orderBy('p.id','DESC')
            ->paginate(self::limit);
        return $data;
    }

}
