<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blogModel;
use App\Models\contactModel;
use App\Models\serviceModel;
use App\Models\userModel;
use App\Http\Requests\StoreFormRequest;

class WebController
{
    protected $blogModel;
    protected $contactModel;
    protected $serviceModel;
    protected $userModel;

    public function __construct()
    {
        $this->blogModel = new blogModel();
        $this->contactModel = new contactModel();
        $this->serviceModel = new serviceModel();
        $this->userModel = new userModel();
    }

    public function home()
    {
        return view("home");
    }

    public function contact()
    {
        return view("contact");
    }

    public function contactHandle(StoreFormRequest $request)
    {
        $validated = $request->validated();
        $this->contactModel->createContact($request);
        return redirect()->route('contact')->with('success', 'Message Sent Successfully!');
    }

    public function blog()
    {
        $data = $this->blogModel->getAllBlogs();
        return view("blog", compact('data'));
    }

    public function blogDetail($slug)
    {
        $data = $this->blogModel->getBlogbySlug($slug);
        return view("blog-detail", compact('data'));
    }

    /**
     * Display a listing of services with search functionality
     */
    public function service(Request $request)
    {
        // dd($request); // Debugging: tampilkan semua data request
        $search = $request->input('search');
        
        if ($search) {
            // Jika ada parameter search, panggil method search
            $data = $this->serviceModel->getServicebyTitle($search);
        } else {
            // Jika tidak ada search, ambil semua data
            $data = $this->serviceModel->getAllServices();
        }
        
        // dd($data); // Debugging: tampilkan data yang diambil dari database
        return view("service", compact('data', 'search'));
    }

    public function serviceDetail($slug)
    {
        $data = $this->serviceModel->getServicebySlug($slug);
        return view("service-detail", compact('data'));
    }

    // Method ini bisa dihapus karena sudah digabung dengan service()
    // public function searchServiceHandle($serviceTitle)
    // {
    //     $data = $this->serviceModel->getServicebyTitle($serviceTitle);
    //     return view("service-detail", compact('data'));
    // }

    public function about()
    {
        return view("about");
    }
}