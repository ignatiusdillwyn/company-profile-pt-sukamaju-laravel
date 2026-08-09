<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

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

  private function storeCoverImage(Request $request)
  {
    if ($request->hasFile('image')) {
      
      $image = $request->file('image');
      $imageName = time() . '_' . $image->getClientOriginalName();
      $image->move(public_path('uploads'), $imageName);
      
      return $imageName;
    }
    
    return null;
  }

  public function createArticle(Request $request)
  {
    // dd($request->all());
    $input = $request->all();
    

    $slug = '';
    if ($input['title']) {
      $title = $input['title'];
      $slug = Str::slug($title); // "ini-judul-artikel"
    }

    if ($request->hasFile('image')) {
      $images = $this->storeCoverImage($request);
    }

    $input['image'] = $images ?? null;

    dd($input);

    $data = DB::select('CALL _createArticle(?,?,?,?,?,?,?,?)', [
      $input['user_id'] ?? '',
      // 'blog',
      $input['article_type'] ?? '',
      $input['title'] ?? '',
      $slug ?? '',
      $input['content'] ?? '',
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
