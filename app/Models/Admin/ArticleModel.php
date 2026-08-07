<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request; // Add this line
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; // Add this line
use Carbon\Carbon; // Add this line

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

  public function createArticle(Request $request)
  {
    $slug = '';
    if ($request['title']) {
      $title = $request['title'];
      $slug = Str::slug($title); // "ini-judul-artikel"
    }

    $data = DB::select('CALL _createArticle(?,?,?,?,?,?,?,?)', [
      $request['user_id'] ?? '',
      // 'blog',
      $request['article_type'] ?? '',
      $request['title'] ?? '',
      $slug ?? '',
      $request['content'] ?? '',
      true,
      Carbon::now(),
      Carbon::now()
    ]);
    return $data;
  }

  public function updateArticle(Request $request)
  {
    $slug = '';
    if ($request['title']) {
      $title = $request['title'];
      $slug = Str::slug($title); // "ini-judul-artikel"
    }

    $data = DB::select('CALL _updateArticle(?,?,?,?,?,?,?)', [
      $request['article_id'],
      // 'blog',
      $request['article_type'] ?? '',
      $request['title'],
      $slug,
      $request['content'],
      $request['is_published'],
      Carbon::now()
    ]);
    return $data;
  }

  public function deleteService($id)
  {
    $articleId = (int) $id;
    $data = DB::select('CALL _deleteArticleById(?)', [$articleId]);
    return $data;
  }
}
