<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin\UserModel;

class AuthController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
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

    public function loginHandle(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        $user = $this->userModel->findByEmail($credentials['email']);

        if (! $user || ! $user->is_active || ! Hash::check($credentials['password'], $user->password)) {
            return back()
                ->withErrors(['email' => 'Email atau password salah.'])
                ->onlyInput('email');
        }

        $request->session()->regenerate();
        $request->session()->put('admin_user', [
            'id'       => $user->id,
            'fullname' => $user->fullname,
            'email'    => $user->email,
            'role'     => $user->role,
        ]);

        return redirect()->intended(route('admin.dashboard'));
    }

    // POST /admin/logout
    public function logout(Request $request)
    {
        $request->session()->forget('admin_user');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
