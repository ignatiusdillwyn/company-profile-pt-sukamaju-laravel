<?php

namespace App\Http\Helpers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AppHelpers
{
  use HasFactory;
  
  public function _storeCoverImage(Request $request)
  {
    if ($request->hasFile('image')) {
      
      $image = $request->file('image');
      $imageName = time() . '_' . $image->getClientOriginalName();
      $image->move(public_path('uploads'), $imageName);
      
      return $imageName;
    }
    
    return null;
  }
}