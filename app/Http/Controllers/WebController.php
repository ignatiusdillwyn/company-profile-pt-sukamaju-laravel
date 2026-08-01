<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blogModel;
use App\Models\contactModel;
use App\Models\serviceModel;
use App\Models\userModel;


class WebController
{
    protected $blogModel;
    protected $contactModel;
    protected $serviceModel;
    protected $userModel;

    public function __construct() {
        $this->blogModel = new blogModel();
        $this->contactModel = new contactModel();
        $this->serviceModel = new serviceModel();
        $this->userModel = new userModel();
     }
    
    public function home() {
        return view("home");
    }

    public function contact() {
        $data = $this->contactModel->getAllContact();
        // dd($data);
        return view("contact");
    }

    public function contactHandle(Request $request) {
        $input = $request->all();
        dd($input);
    }

    public function blog() {
        $data = $this->blogModel->getAllBlogs();
        return view("blog", compact('data'));

    }

    public function blogDetail($slug) {
        return view("blog-detail");
    }

    public function service() {
        $data = $this->serviceModel->getAllServices();
        return view("service", compact('data'));
    }

    public function serviceDetail($slug) {
        return view("service-detail");
    }

    public function about() {
        // $data = $this->serviceModel->getAllAbout();
        return view("about");
    }
}
