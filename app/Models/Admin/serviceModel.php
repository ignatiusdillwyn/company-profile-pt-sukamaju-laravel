<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request; // Import the Request class
use Illuminate\Support\Facades\DB; // Import the DB facade
use Illuminate\Support\Str; // Import the Str facade
use Carbon\Carbon; // Import the Carbon class

class serviceModel extends Model
{
    public function createService(Request $request)
    {
        $slug = '';
        if ($request['title']) {
            $title = $request['title'];
            $slug = Str::slug($title); // "ini-judul-artikel"
        }

        $data = DB::select('CALL _createArticle(?,?,?,?,?,?,?,?)', [
            $request['user_id'] ?? '',
            'service',
            $request['title'] ?? '',
            $slug ?? '',
            $request['content'] ?? '',
            true,
            Carbon::now(),
            Carbon::now()
        ]);
        return $data;
    }

    public function updateService(Request $request)
    {
        $slug = '';
        if ($request['title']) {
            $title = $request['title'];
            $slug = Str::slug($title); // "ini-judul-artikel"
        }

        $data = DB::select('CALL _updateArticle(?,?,?,?,?,?,?)', [
            $request['article_id'],
            'service',
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
