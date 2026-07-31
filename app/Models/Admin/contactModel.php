<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request; // Import the Request class
use Illuminate\Support\Facades\DB; // Import the DB facade
use Illuminate\Support\Str; // Import the Str facade
use Carbon\Carbon; // Import the Carbon class

class contactModel extends Model
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
}
