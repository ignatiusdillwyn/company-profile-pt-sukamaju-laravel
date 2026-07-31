<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\userModel;

class AuthController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new userModel();
    }

    public function registerRender()
    {
        // $data = $this->userModel->createUser('halo');
        // return redirect()->intended(route('admin.dashboard'));

        return view('admin.register');
    }

    public function registerHandle(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        $this->userModel->createUser($data);
        // return redirect()->intended(route('admin.login'));
        return view('admin.login');
    }

    // GET /admin/login - menampilkan form login
    public function loginRender()
    {

        return view('admin.login');
    }

    // POST /admin/login - memproses form login
    public function loginHandle(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'));
        }

        return back()
            ->withErrors(['email' => 'Email atau password salah.'])
            ->onlyInput('email');
    }

    // POST /admin/logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
