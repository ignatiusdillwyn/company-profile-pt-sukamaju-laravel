<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController
{
    public function home () {
        return view("home");
    }

    public function contact () {
        return view("contact");
    }

    public function contactHandle(Request $request) {
        $input = $request->all();
        dd($input);
    }

    public function blog ($slug) {
        return view("blog");
    }

    public function service ($slug) {
        return view("service");
    }

    public function about () {
        return view("about");
    }
}
