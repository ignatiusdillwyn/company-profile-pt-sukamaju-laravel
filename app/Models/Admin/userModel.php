<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class userModel extends Model
{
    public function createUser($request)
    {
        // $data = DB::select('CALL _createUser(?,?,?,?,?,?,?)', [
        //     'ignatius dillwyn',
        //     'ignadillwyn@gmail.com',
        //     '123456',
        //     'admin',
        //     true,
        //     Carbon::now(),
        //     Carbon::now()
        // ]);

        $data = DB::select('CALL _createUser(?,?,?,?,?,?,?)', [
            $request['name'] ?? '',
            $request['email'] ?? '',
            $request['password'] ?? '',
            'author',
            true,
            Carbon::now(),
            Carbon::now()
        ]);

        // dd($data);

        return 'Success create user';
    }

    public function updateUser()
    {
        $data = 'ini update user';
        return $data;
    }

    public function deleteUser()
    {
        $data = 'ini delete user';
        return $data;
    }
}
