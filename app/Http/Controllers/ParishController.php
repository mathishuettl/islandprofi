<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parish;
use App\Region;
use App\Location;

class ParishController extends Controller
{
  public function rules() {
    return [
      "title" => "required",
      "region_id" => "required"
    ];
  }

  public function index() {
    $parishes = Parish::all();

    return view("parishes.index", ["parishes" => $parishes]);
  }

  public function add() {
    return view("parishes.form", ["regions" => Region::all()]);
  }

  public function edit(Request $request, Parish $parish) {
    $locationQuery = Location::query();
    $locationQuery->where("parish_id", $parish->id);

    if (isset($_GET["type"]) && $_GET["type"]) {
      $locationQuery->where("type", $_GET["type"]);
    }

    return view("parishes.form", ["parish" => $parish, "regions" => Region::all(), "locations" => $locationQuery->get()]);
  }

  public function add_submit(Request $request) {
    $request->validate($this->rules());

    $parish = Parish::create($request->all());
    $request->session()->flash("alert", ["message" => "Die Gemeinde wurde erfolgreich angelegt", "type" => "success"]);

    return redirect()->route("parish.edit", $parish->id);
  }

  public function edit_submit(Request $request, Parish $parish) {
    $request->validate($this->rules());

    $parish->update($request->all());
    $request->session()->flash("alert", ["message" => "Die Gemeinde wurde erfolgreich aktualisiert", "type" => "success"]);

    return redirect()->route("parish.edit", $parish->id);
  }

}
