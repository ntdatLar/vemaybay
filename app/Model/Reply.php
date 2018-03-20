<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table='replys';
    public $timestamp=true;
    static public function getListReply($id_services){
        $data = Reply::join('users', 'users.id', '=', 'replys.id_user')
            ->select('replys.*', 'users.name', 'users.fullname','users.gender','users.avartar','users.job','users.addr as uaddr')
            ->where([['id_services','=',$id_services],['replys.status','=',1]])
            ->orderBy('replys.created_at','ASC')
            ->paginate(10);
        return $data;
    }
    static public function getMaxMoney($id_services){
        $data = Reply::where([['id_services','=',$id_services],['replys.status','=',1]])->max('money');
        //pre($data);
        return $data;
    }
    static public function getMinMoney($id_services){
        $data = Reply::where([['id_services','=',$id_services],['replys.status','=',1]])->min('money');
        return $data;
    }
    static public function getAVGMoney($id_services){
        $data = Reply::where([['id_services','=',$id_services],['replys.status','=',1]])->avg('money');
        return $data;
    }
}
