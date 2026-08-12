<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\ArticleModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ArticleFormRequest;
use Illuminate\Support\Facades\Log;

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
    $action_path = route('admin.article-save');
    $redirect_path = route('admin.article-index', ['article_type' => $type]);
    return view('admin.article.form', compact('type', 'formType', 'action_path', 'redirect_path'));
  }

  public function createHandle(ArticleFormRequest $request)
  {
    $this->article->createArticle($request);
    return redirect()->route('admin.article-index', ['article_type' => $request['type']]);
  }

  public function editRender(Request $request)
  {
    $type = $request['type'];
    $id = $request->get('id', false);

    $formType = 'edit';
    $action_path = route('admin.article-update');
    $redirect_path = route('admin.article-index', ['article_type' => $type]);

    $article = $this->article->getArticlesById($id);
    return view('admin.article.form', compact('type', 'article', 'formType', 'action_path', 'redirect_path'));
  }

  public function editHandle(Request $request)
  {
    // dd($request->all());
    $id = $request->get('id', false);
    $type = $request->get('type', false);

    $this->article->updateArticle($request);
    return redirect()->route('admin.article-index', ['article_type' => $type]);
  }

  public function deleteHandle(Request $request)
  {
    $id = $request['id'];
    $type = $request['type'];

    $this->article->deleteArticlebyId($id);
    return redirect()->route('admin.article-index', ['article_type' => $type]);
  }

  public function removeImage($article_id, Request $request)
  {
    Log::info('removeImage called', [
      'article_id' => $request['article_id'],
      'type' => $request['type'],
      'article_id dari parameter' => $article_id,
      'all' => $request->all()
    ]);

    $type = $request['type'];

    $this->article->removeArticleImage($article_id);
    $article = $this->article->getArticlesById($article_id);
    Log::info('removeImage called', [
      'data' => $article,
    ]);

    // Return success response
    return redirect()->route('admin.article-edit', ['type' => $type, 'id' => $article_id])->with('success', 'Image removed successfully.');
  }
}
