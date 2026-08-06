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
        $dataFromDB = DB::select('CALL _getArticleBySlug(?)', [$articleSlug]);

        $data = [];

        foreach ($dataFromDB as $index => $item) {
            $data['id'] = $item->id;
            $data['user_id'] = $item->user_id;
            $data['article_type'] = $item->article_type;
            $data['title'] = $item->title;
            $data['slug'] = $item->slug;
            $data['image'] = $item->image;
            $data['content'] = $item->content;
            $data['is_published'] = $item->is_published;
            $data['created'] = $item->created;
            $data['updated'] = $item->updated;
        }
        return $data;
    }

    public function getBlogbyId($id)
    {
        $articleId = (int) $id;
        $data = DB::select('CALL _getArticleById(?)', [$articleId]);
        return $data;
    }

}
