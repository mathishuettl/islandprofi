<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class LocationController extends Controller
{
  protected function getLocationImages($location_id) {
    $images = [];
    $storageDir = "/" . $location_id;

    if (Storage::exists($storageDir)) {
      $files = Storage::files($storageDir);
      foreach ($files as $file) {
        $images[] = [
          "path" => $file,
          "url" => Storage::url($file)
        ];
      }
    }

    return $images;
  }

  protected function validateLocation(Request $request) {
    $rules = [
      "parish_id" => "required|exists:parishes,id",
      "external_id" => [
        "required",
        Rule::unique('locations', 'external_id')->ignore($request->input("external_id"), "external_id"),
      ],
      "address" => "required",
      "name" => "required",
      "zip" => "required",
      "city" => "required"
    ];

    if ($request->hasFile("images")) {
      $rules["images.*"] = "mimes:jpg,jpeg,png|max:2048";
    }

    $request->validate($rules);
  }

  public function handleFileUploads(Request $request, $location) {
    if ($request->hasFile("images")) {
      foreach ($request->file("images") as $image) {
        $image->store($location->id);
      }
    }
  }
}
