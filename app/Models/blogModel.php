<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class blogModel extends Model
{

    public function getAllBlogs()
    {
        $data = DB::select('CALL _getAllBlogs()');
        return $data;
    }

    public function getBlogbySlug($slug)
    {
        $articleSlug = (string) $slug;
        $data = DB::select('CALL _getArticleBySlug(?)', [$articleSlug]);
        return $data;
    }

    public function getBlogbyId($id)
    {
        $articleId = (int) $id;
        $data = DB::select('CALL _getArticleById(?)', [$articleId]);
        return $data;
    }

}
