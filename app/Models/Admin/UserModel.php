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
        $data = DB::select('CALL _getAllUsers()');

        return $data;
    }

    public function getUserById($id = null)
    {
        $userId = (int) $id;
        $dataFromDB = DB::select('CALL _getUserById(?)', [$userId]);

        $data = [];

        foreach ($dataFromDB as $index => $item) {
            $data['id'] = $item->id;
            $data['fullname'] = $item->fullname;
            $data['email'] = $item->email;
            // $data['password'] = $item->title;
            $data['role'] = $item->role;
            $data['is_active'] = $item->is_active;
            $data['created'] = $item->created;
            $data['updated'] = $item->updated;
        }
        // dd($data);
        return $data;
    }

    public function updateUser($request)
    {
        // dd($request);

        $hashedPassword = null;
        // Hash password sebelum dikirim ke stored procedure
        if ($request['password'] != null) {
            $hashedPassword = Hash::make($request['password']);
        }

        // dd($request, $hashedPassword);

        $data = DB::select('CALL _updateUser(?,?,?,?,?,?,?)', [
            $request['id'],
            $request['email'] ?? null,
            $hashedPassword ?? null, // Password sudah di-hash
            $request['name'] ?? null,
            $request['role'] ?? null,
            true, // is_active
            Carbon::now() // updated_at
        ]);

        return 'Success update user';
    }

    public function deleteUserById($id)
    {
        $userId = (int) $id;
        $data = DB::select('CALL _deleteUser(?)', [$userId]);
        return $data;
    }
}
