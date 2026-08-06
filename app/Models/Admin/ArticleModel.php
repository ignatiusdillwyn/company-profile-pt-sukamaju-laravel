<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ArticleModel extends Model
{
  public function getAllArticlesByArticleType($articleType = null)
  {
    // $data = DB::table('table_articles')
    //   ->where('article_type', $articleType)
    //   ->get();

    // return $data;

    $data = DB::select('CALL _getAllArticlesByType(?)', [$articleType]);
    return $data;
  }
}
