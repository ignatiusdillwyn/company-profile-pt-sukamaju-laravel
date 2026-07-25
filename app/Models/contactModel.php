<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contactModel extends Model
{
    public function createContact()
    {
        $data = 'ini create contacts as request form';
        return $data;
    }

}
