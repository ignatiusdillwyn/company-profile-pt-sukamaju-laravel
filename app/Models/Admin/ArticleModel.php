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
      $input['image'] = '/uploads/' . $images ?? null;
    } else {
      $input['image'] = null;
    }

    $is_published = isset($input['is_published']) ? (bool) $input['is_published'] : false;

    $data = DB::select('CALL _createArticle(?,?,?,?,?,?,?,?,?)', [
      $input['user_id'] ?? '',
      $input['type'] ?? '',
      $input['title'] ?? '',
      $slug ?? '',
      $input['content'] ?? '',
      $is_published ?? 0,
      $input['image'] ?? '',
      Carbon::now(),
      Carbon::now()
    ]);
    return $data;
  }

  public function updateArticle(Request $request)
  {
    $input = $request->all();

    $articleId = $request->get('id', false);

    $slug = '';
    if ($input['title']) {
      $title = $input['title'];
      $slug = Str::slug($title); // "ini-judul-artikel"
    }

    // upload image ketika ada file image yang diupload
    if ($request->hasFile('image')) {
      $images = $this->helper->_storeCoverImage($request);
      $input['image'] = '/uploads/' . $images ?? null;
    } else {
      $input['image'] = null;
    }

    $data = DB::select('CALL _updateArticle(?,?,?,?,?,?,?,?)', [
      $articleId,
      // $input['type'] ?? '',
      // $input['title'],
      // $slug,
      // $input['content'],
      // $input['is_published'],
      // $input['image'] ?? '',
      // Carbon::now()
      $input['type'] ?? '',
      $input['title'] ?? '',
      $slug ?? '',
      $input['content'] ?? '',
      $is_published ?? 0,
      $input['image'] ?? '',
      Carbon::now(),
    ]);
    return $data;
  }

  public function deleteArticlebyId($id)
  {
    $articleId = (int) $id;
    $data = DB::select('CALL _deleteArticleById(?)', [$articleId]);
    return $data;
  }

  public function countTotalArticle()
  {
    $dataFromDB = DB::select('CALL _countTotalArticle()');
    $data = $dataFromDB[0]->{'count(*)'}; // 16
    // dd($data);
    return $data;
  }

  public function countTotalArticleByType($article_type)
  {
    $dataFromDB = DB::select('CALL _countTotalArticleByType(?)', [(string)$article_type]);
    $data = $dataFromDB[0]->{'count(*)'}; // 16
    // dd($data); 
    return $data;
  }

}
