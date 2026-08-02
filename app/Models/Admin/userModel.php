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
            $request['role'] ?? ''  ,
            true,
            Carbon::now(),
            Carbon::now()
        ]);

        // dd($data);

        return 'Success create user';
    }

    // Cari user berdasarkan email di tabel table_users - dipakai untuk login
    // via Query Builder (bukan Eloquent), sesuai tabel yang diisi createUser().
    public function findByEmail($email)
    {
        return DB::table('table_users')->where('email', $email)->first();
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
