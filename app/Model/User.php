<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class User extends Model
{
    protected $table='users';
    public $timestamp=true;
    static public function getInfoAuth(){
        $id = Auth::user()->id;
        $data = User::findOrFail($id);
        if(!$data){
            return false;
        }
        return $data;
    }
}
