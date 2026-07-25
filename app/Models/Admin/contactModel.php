<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class contactModel extends Model
{
    public function createContact()
    {
        $data = 'ini create contact';
        return $data;
    }

    public function getAllContact()
    {
        $data = 'ini get all contacts';
        return $data;
    }
}
