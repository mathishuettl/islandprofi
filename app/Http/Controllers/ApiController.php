<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
  public function deleteImage(Request $request) {
    Storage::delete($request->input("path"));
  }
}
