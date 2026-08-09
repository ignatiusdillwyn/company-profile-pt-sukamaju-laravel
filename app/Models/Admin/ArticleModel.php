<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use App\Http\Helpers\AppHelpers;

class ArticleModel extends Model
{
  protected $helper;

  public function __construct()
  {
    $this->helper = new AppHelpers();
  }

  public function getAllArticlesByArticleType($articleType = null)
  {
    // $data = DB::table('table_articles')
    //   ->where('article_type', $articleType)
    //   ->get();

    // return $data;

    $data = DB::select('CALL _getAllArticlesByType(?)', [$articleType]);
    return $data;
  }

  public function getArticlesById($id = null)
  {
    $articleId = (int) $id;
    $dataFromDB = DB::select('CALL _getArticleById(?)', [$articleId]);

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
      $images = $this->helper->_storeCoverImage($request);
    }

    $input['image'] = '/uploads/' . $images ?? null;

    // dd($input);

    $data = DB::select('CALL _createArticle(?,?,?,?,?,?,?,?,?)', [
      $input['user_id'] ?? '',
      // 'blog',
      $input['article_type'] ?? '',
      $input['title'] ?? '',
      $slug ?? '',
      $input['content'] ?? '',
      true,
      $input['image'] ?? '',
      Carbon::now(),
      Carbon::now()
    ]);
    return $data;
  }

  public function updateArticle(Request $request)
  {
    $input = $request->all();

    $slug = '';
    if ($input['title']) {
      $title = $input['title'];
      $slug = Str::slug($title); // "ini-judul-artikel"
    }

    // upload image ketika ada file image yang diupload
    if ($request->hasFile('image')) {
      $images = $this->helper->_storeCoverImage($request);
      $input['image'] = '/uploads/' . $images;
    }

    $data = DB::select('CALL _updateArticle(?,?,?,?,?,?,?)', [
      $input['article_id'],
      // 'blog',
      $input['article_type'] ?? '',
      $input['title'],
      $slug,
      $input['content'],
      $input['is_published'],
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
