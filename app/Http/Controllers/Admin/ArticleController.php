<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\ArticleModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ArticleController
{

  protected $article;

  public function __construct()
  {
    $this->article = new ArticleModel();
  }

  public function indexRender(Request $request)
  {

    $type = $request->query('article_type', false);

    $articles = $this->article->getAllArticlesByArticleType($type);
    // dd($articles);
    $data = [
      'type'      => $type,
      'articles'  => $articles
    ];

    return view('admin.article.index', $data);
  }

  public function createRender(Request $request)
  {
    $type = $request['type'];
    $formType = 'create';
    // dd($article_type);  
    return view('admin.article.form', compact('type', 'formType'));
  }

  public function createHandle(Request $request)
  {
    $this->article->createArticle($request);
    return redirect()->route('admin.article-index', ['article_type' => $request['article_type']]);
  }

  public function editRender(Request $request)
  {
    $type = $request['type'];
    $id = $request->get('id', false);

    $formType = 'edit';

    $article = $this->article->getArticlesById($id);

    return view('admin.article.form', compact('type', 'article', 'formType'));
  }

  public function editHandle(Request $request)
  {
    // dd($request->all());
    $id = $request->get('id', false);
    $type = $request->get('type', false);


    $this->article->updateArticle($request);
    return redirect()->intended(route('admin.article-index'));
  }

}
