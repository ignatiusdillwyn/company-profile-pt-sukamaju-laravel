<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class serviceModel extends Model
{
    public function getAllServices()
    {
        $data = DB::select('CALL _getAllServices()');
        return $data;
    }

    public function getServicebySlug($slug)
    {
        $serviceSlug = (string) $slug;
        $dataFromDB= DB::select('CALL _getArticleBySlug(?)', [$serviceSlug]);
        // dd($dataFromDB);

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

        // dd($data);

        return $data;
    }

    public function getServicebyId($id)
    {
        $serviceId = (int) $id;
        $data = DB::select('CALL _getArticleById(?)', [$serviceId]);
        return $data;
    }

    public function getServicebyTitle($title)
    {
        $serviceTitle = (string) $title;

        $data = DB::select('CALL _searchArticleByTitle(?,?)', [$serviceTitle, 'service']);
        return $data;
    }

}
