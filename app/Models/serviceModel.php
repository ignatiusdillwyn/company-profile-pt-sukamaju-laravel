<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class serviceModel extends Model
{
    public function createService()
    {
        $data = 'ini create service';
        return $data;
    }

    public function getAllServices()
    {
        $data = 'ini get all services';
        return $data;
    }

    public function getServicebyId()
    {
        $data = 'ini get service by id';
        return $data;
    }

    public function getServicebySlug()
    {
        $data = 'ini get service by slug';
        return $data;
    }

    public function updateService()
    {
        $data = 'ini update service';
        return $data;
    }

    public function deleteService()
    {
        $data = 'ini delete service';
        return $data;
    }
}
