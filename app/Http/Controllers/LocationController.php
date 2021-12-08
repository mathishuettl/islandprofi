<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LocationController extends Controller
{
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

    $request->validate($rules);
  }
}
