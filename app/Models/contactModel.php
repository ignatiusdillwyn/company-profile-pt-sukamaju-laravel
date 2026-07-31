<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; // Add this line

class contactModel extends Model
{
    public function getAllContact()
    {
        $data = DB::select('CALL _getAllContacts()');
        return $data;
    }

    public function getContactById($id)
    {
        $contactId = (int) $id;
        $data = DB::select('CALL _getContactbyId(?)', [$contactId]);
        return $data;
    }
}
