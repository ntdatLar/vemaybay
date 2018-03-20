<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ReplyUsers extends Model
{
    protected $table = "reply_user";
    public $timestamp=true;
    static public function getListIdReply($user_id,$id_servives){
        $listid = ReplyUsers::select('id_reply')->where(['id_user'=>$user_id,'status' => 1,'id_services' => $id_servives])->pluck('id_reply');
            return $listid;
    }
}
