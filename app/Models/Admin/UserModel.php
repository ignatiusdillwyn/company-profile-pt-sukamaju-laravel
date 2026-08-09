<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Add this line
use Carbon\Carbon;

class UserModel extends Model
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

        // Hash password sebelum dikirim ke stored procedure
        $hashedPassword = Hash::make($request['password']);

        $data = DB::select('CALL _createUser(?,?,?,?,?,?,?)', [
            $request['name'],
            $request['email'],
            $hashedPassword, // Password sudah di-hash
            $request['role'],
            true, // is_active
            Carbon::now(), // created_at
            Carbon::now() // updated_at
        ]);

        return 'Success create user';
    }

    // Cari user berdasarkan email di tabel table_users - dipakai untuk login
    // via Query Builder (bukan Eloquent), sesuai tabel yang diisi createUser().
    public function findByEmail($email)
    {
        return DB::table('table_users')->where('email', $email)->first();
    }

    public function getAllUsers()
    {
        $data = DB::table('table_users')
            ->get();

        return $data;
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
