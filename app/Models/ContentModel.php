<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentModel extends Model
{
  public function create(
    $title,
    $slug,
    $content,
    $author,
    $created_at,
    $updated_at
  ) {
    return $this->insert([
      'title' => $title,
      'slug' => $slug,
      'content' => $content,
      'author' => $author,
      'created_at' => $created_at,
      'updated_at' => $updated_at
    ]);
  }
}
