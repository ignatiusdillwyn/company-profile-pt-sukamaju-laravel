<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ContentModel extends Model
{
  public function create($content) 
  {
    foreach ($content as $item) {
      
      $userId       = $item['user_id'];
      $articleType  = $item['article_type'];
      $title        = $item['title'];
      $slug         = $item['slug'];
      $image        = $item['image'];
      $content      = $item['content'];
      $isPublished  = $item['is_published'];
      $createdAt    = $item['created_at'];
      $updatedAt    = $item['updated_at'];

      // Simpan data ke database
      $data = DB::table('table_articles')
              ->insert([
        'user_id'       => $userId,
        'article_type'  => $articleType,
        'title'         => $title,
        'slug'          => $slug,
        'image'         => $image,
        'content'       => $content,
        'is_published'  => $isPublished,
        'created'    => $createdAt,
        'updated'    => $updatedAt
      ]);

    }

    return $data;
  }
}
