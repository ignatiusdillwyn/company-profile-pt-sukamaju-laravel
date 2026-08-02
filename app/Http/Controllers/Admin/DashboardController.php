<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController
{
    // GET /admin - hanya bisa diakses jika lolos middleware 'admin'
    public function index(Request $request)
    {
        $user = $request->session()->get('admin_user');

        return view('admin.dashboard', compact('user'));
    }
}
