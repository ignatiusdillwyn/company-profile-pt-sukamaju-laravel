<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController
{
    // GET /admin - hanya bisa diakses jika lolos middleware 'admin'
    public function index()
    {
        $user = Auth::user();

        return view('admin.dashboard', compact('user'));
    }
}
