<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController
{
    public function home() {
        return view("home");
    }

    public function contact() {
        return view("contact");
    }

    public function contactHandle(Request $request) {
        $input = $request->all();
        dd($input);
    }

    public function blog() {
        return view("blog");
    }

    public function blogDetail($slug) {
        return view("blog-detail");
    }

    public function service() {
        return view("service");
    }

    public function serviceDetail($slug) {
        return view("service-detail");
    }

    public function about() {
        return view("about");
    }
}
