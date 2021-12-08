<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;

class RegionController extends Controller
{
  public function index() {
    $regions = Region::all();

    return view("regions.index", ["regions" => $regions]);
  }

  public function add() {
    return view("regions.form");
  }

  public function rules() {
    return [
      "title" => "required"
    ];
  }

  public function add_submit(Request $request) {
    $request->validate($this->rules());

    $region = Region::create($request->all());
    $request->session()->flash("alert", ["message" => "Die Region wurde erfolgreich angelegt", "type" => "success"]);

    return redirect()->route("region.edit", $region->id);
  }

  public function edit(Request $request, Region $region) {
    return view("regions.form", ["region" => $region]);
  }

  public function edit_submit(Request $request, Region $region) {
    $request->validate($this->rules());

    $region->update($request->all());
    $request->session()->flash("alert", ["message" => "Die Region wurde erfolgreich aktualisiert", "type" => "success"]);

    return redirect()->route("region.edit", $region->id);
  }
}
