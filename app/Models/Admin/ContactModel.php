<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request; // Import the Request class
use Illuminate\Support\Facades\DB; // Import the DB facade
use Illuminate\Support\Str; // Import the Str facade
use Carbon\Carbon; // Import the Carbon class

class ContactModel extends Model
{
    public function createContact(Request $request)
    {
        $data = DB::select('CALL _createContact(?,?,?,?,?,?,?)', [
            $request['full_name'] ?? '',
            $request['email'] ?? '',
            $request['phone'] ?? '',
            $request['notes'] ?? '',
            false,
            Carbon::now(),
            Carbon::now()
        ]);
        return $data;
    }

    public function getAllContacts()
    {
        $data = DB::select('CALL _getAllContacts');
        return $data;
    }

    public function markAsRead($id)
    {
        $data = DB::select('CALL _markAsReadContact(?,?)', [
            (int) $id,
            Carbon::now()
        ]);
        return $data;
    }

    public function deleteContact($id)
    {
        $data = DB::select('CALL _deleteContact(?)', [
            (int) $id,
        ]);
        return $data;
    }

    public function countUnreadContact()
    {
        $dataFromDB = DB::select('CALL _countUnreadContact()');
        $data = $dataFromDB[0]->{'count(*)'}; // 16
        // dd($data); 
        return $data;
    }
}
