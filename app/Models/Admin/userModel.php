<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{
    public function createUser()
    {
        $data = 'ini create user';
        return $data;
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
