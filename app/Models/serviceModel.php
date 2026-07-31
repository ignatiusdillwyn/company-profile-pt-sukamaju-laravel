<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class serviceModel extends Model
{
    public function getAllServices()
    {
        $data = DB::select('CALL _getAllServices()');
        return $data;
    }

    public function getServicebySlug($slug)
    {
        $serviceSlug = (string) $slug;
        $data = DB::select('CALL _getArticleBySlug(?)', [$serviceSlug]);
        return $data;
    }

    public function getServicebyId($id)
    {
        $serviceId = (int) $id;
        $data = DB::select('CALL _getArticleById(?)', [$serviceId]);
        return $data;
    }

}
