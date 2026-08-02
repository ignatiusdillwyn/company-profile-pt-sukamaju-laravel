<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\UserModel;

class UserController
{
  protected $user;

  public function __construct()
  {
    $this->user = new UserModel();
  }

  public function indexRender(Request $request)
  {
    $data = [
      'users' => $this->user->getAllUsers()
    ];
// dd($data);
    return view('admin.users.index', $data);
  }
}
