<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Add this line
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

        // Hash password sebelum dikirim ke stored procedure
        $hashedPassword = Hash::make($request['password']);
        // dd($hashedPassword);
        
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

    public function getAllUsers()
    {
        $data = 'ini get all users';
        return $data;
    }

    public function getUserbyId()
    {
        $data = 'ini get user by id';
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
