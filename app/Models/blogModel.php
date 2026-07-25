<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class blogModel extends Model
{
    public function createBlog()
    {
        $data = 'ini create blog';
        return $data;
    }

    public function getAllBlogs()
    {
        $data = 'ini get all blog';
        return $data;
    }

    public function getBlogbyId()
    {
        $data = 'ini get blog by id';
        return $data;
    }

    public function getBlogbySlug()
    {
        $data = 'ini get blog by slug';
        return $data;
    }

    public function updateBlog()
    {
        $data = 'ini get update blog';
        return $data;
    }

    public function deleteBlog()
    {
        $data = 'ini delete blog';
        return $data;
    }
}
