<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class serviceModel extends Model
{
    public function getAllServices()
    {
        $data = 'ini get all services';
        return $data;
    }

    public function getServicebySlug()
    {
        $data = 'ini get service by slug';
        return $data;
    }

}
