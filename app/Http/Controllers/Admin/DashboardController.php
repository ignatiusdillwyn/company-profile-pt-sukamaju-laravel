<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\ArticleModel;
use App\Models\Admin\ContactModel;

class DashboardController
{
    private $contact;
    private $articleModel;

    // GET /admin - hanya bisa diakses jika lolos middleware 'admin'
    public function __construct()
    {
        $this->contact = new ContactModel();
        $this->articleModel = new ArticleModel();
    }

    public function index(Request $request)
    {
        $user = $request->session()->get('admin_user');
        $totalArticle = $this->articleModel->countTotalArticle();
        $totalService = $this->articleModel->countTotalArticleByType('service');
        $totalBlog = $this->articleModel->countTotalArticleByType('blog');
        $unreadContact = $this->contact->countUnreadContact();
        // dd($totalArticle, $totalService, $totalBlog);

        return view('admin.dashboard', compact('user', 'totalArticle', 'totalService', 'totalBlog', 'unreadContact'));
    }
}
