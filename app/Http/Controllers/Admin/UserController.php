<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\UserModel;

class UserController
{
  protected $userModel;

  public function __construct()
  {
    $this->userModel = new UserModel();
  }

  public function indexRender(Request $request)
  {
    $data = [
      'users' => $this->userModel->getAllUsers()
    ];
    return view('admin.users.index', $data);
  }

  public function createRender()
  {
    $data = [
      'users' => $this->userModel->getAllUsers()
    ];
    return view('admin.users.form');
  }

  public function createHandle(Request $request)
  {
    $data = $request->all();

    $credentials = $request->validate([
        'name'    => 'required',
        'email'    => 'required|email|unique:table_users,email',
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required|in:admin,author',
    ]);

    $this->userModel->createUser($data);
    return redirect()->intended(route('admin.user-index-cms'));
  }
}
