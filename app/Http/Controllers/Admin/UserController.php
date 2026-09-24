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
    // $data = [
    //   'users' => $this->userModel->getAllUsers()
    // ];
    $formType = 'create';
    $action_path = route('admin.user-save');
    $redirect_path = route('admin.user-index-cms');
    return view('admin.users.form', compact('formType', 'action_path', 'redirect_path'));
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
    // return redirect()->intended(route('admin.user-index-cms'));
    return response()->json([
      'success' => true,
      'message' => 'User Created successfully.',
      'redirect' => route('admin.user-index-cms')
    ]);
  }

  public function editRender(Request $request)
  {
    // $data = [
    //   'users' => $this->userModel->getAllUsers()
    // ];
    $id = $request['id'];
    $user = $this->userModel->getUserById($id);
    $formType = 'edit';
    $action_path = route('admin.user-update');
    $redirect_path = route('admin.user-index-cms');
    return view('admin.users.form', compact('formType', 'user', 'action_path', 'redirect_path'));
  }

  public function editHandle(Request $request)
  {
    $data = $request->all();
    // dd($data);  
    $credentials = $request->validate([
      'id' => 'required|integer',
      'name' => 'required|string|max:255',
      'email' => 'required|email', // Tambahkan ID untuk update
      'password' => 'nullable|min:8|confirmed', // ← NULLABLE = tidak wajib
      'role' => 'required|in:admin,author',
    ]);

    // dd($credentials);

    $this->userModel->updateUser($credentials);
    // return redirect()->intended(route('admin.user-index-cms'));
    return response()->json([
      'success' => true,
      'message' => 'User Updated successfully.',
      'redirect' => route('admin.user-index-cms')
    ]);
  }

  public function deleteHandle(Request $request)
  {
    $id = $request['id'];

    $this->userModel->deleteUserById($id);
    // return redirect()->route('admin.article-index', ['article_type' => $type]);

    // return response()->json([
    //   'success' => true,
    //   'message' => 'Article deleted successfully.',
    //   'redirect' => route('admin.article-index', ['article_type' => $type])
    // ]);

    return redirect()->route('admin.user-index-cms');
  }
}
