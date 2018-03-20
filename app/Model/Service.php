<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Service extends Model
{
    protected $table='services';
    public $timestamp=true;
    static public function getListService($type){
        //echo $type;
        //die;
        $data = Service::join('users', 'users.id', '=', 'services.id_user')
            ->join('location', 'location.id', '=', 'services.location')
            ->select('services.*', 'users.name', 'users.fullname','users.gender','users.avartar','users.addr','location.name as location_name')
            //->groupBy('services.id')
            ->where([
                ['services.status', '=', '1'],
                ['services.type', '=', $type],
                ['services.code', '<>', null],
            ])

            ->orderBy('services.deadline','DESC')
            //->get();
            ->paginate(12);
        return $data;
    }
    static public function getDetail($type,$code){
        $data = Service::join('users', 'users.id', '=', 'services.id_user')
            ->join('location', 'location.id', '=', 'services.location')
            ->select('services.*', 'users.name', 'users.fullname','users.gender','users.avartar','users.addr as uaddr','location.name as location_name')
            ->where([
                ['services.status', '=', '1'],
                ['services.type', '=', $type],
                ['services.code', '=', $code],
            ])
            ->orderBy('services.deadline')
            ->first();
        return $data;
    }
}
