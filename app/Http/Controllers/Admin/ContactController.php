<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\ContactModel;

class ContactController
{
  protected $contact;

  public function __construct()
  {
    $this->contact = new ContactModel();
  }

  public function contactList(Request $request)
  {
    $getContacts = $this->contact->getAllContacts();

    $data = [
      'contacts' => $getContacts
    ];

    return view('admin.contact.index', $data);
  }

  public function markAsRead(Request $request, $id)
  {
    $this->contact->markAsRead($id);

    return redirect()
      ->route('admin.contact-list')
      ->with('success', 'Pesan berhasil ditandai sudah dibaca.');
  }

  public function deleteContact($id)
  {
    $this->contact->deleteContact($id);

    // return redirect()
    //   ->route('admin.contact-list')
    //   ->with('success', 'Pesan berhasil dihapus');
    return response()->json([
      'success' => true,
      'message' => 'Pesan berhasil dihapus',
      'redirect' => route('admin.contact-list')
    ]);
  }
}
