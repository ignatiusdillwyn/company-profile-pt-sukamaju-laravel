<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class blogModel extends Model
{

    public function getAllBlogs()
    {
        $data = 'ini get all blog';
        return $data;
    }

    public function getBlogbySlug()
    {
        $data = 'ini get blog by slug';
        return $data;
    }

}
