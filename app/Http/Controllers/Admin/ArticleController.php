<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\ArticleModel;

class ArticleController
{

  protected $article;

  public function __construct()
  {
    $this->article = new ArticleModel();
  }

  public function indexRender()
  {
    return view('admin.article.index');
  }

  public function createRender()
  {
    return view('admin.article.form');
  }

  public function createHandle(Request $request)
  {
    // dd($request->all());
    return redirect()->intended(route('admin.article-index'));
  }

  public function editRender(Request $request, $id)
  {
    return view('admin.article.form');
  }

  public function editHandle(Request $request, $id)
  {
    // dd($request->all());
    return redirect()->intended(route('admin.article-index'));
  }
}
