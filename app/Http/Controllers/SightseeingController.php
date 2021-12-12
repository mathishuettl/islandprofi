<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parish;
use App\Location;
use App\SightseeingSpot;

class SightseeingController extends LocationController
{
  public function index() {
    return view("locations.sightseeing.index", ["sightseeingspots" => SightseeingSpot::all()]);
  }

  public function add() {
    return view("locations.sightseeing.form", ["parishes" => Parish::all()]);
  }

  private function prepareData(Request $request) {
    $data = $request->all();

    if ($request->has("4x4_required")) {
      $data["4x4_required"] = true;
    }

    return $data;
  }

  private function rules() {
    $rules = [

    ];

    return $rules;
  }

  public function add_submit(Request $request) {
    $this->validateLocation($request);
    $request->validate($this->rules());
    $data = $this->prepareData($request);

    $location = Location::create($data);
    $data["location_id"] = $location->id;

    $sightseeingspot = SightseeingSpot::create($data);
    $location->update(["spot_id" => $sightseeingspot->id]);
    $request->session()->flash("alert", ["message" => "Der Sightseeing Spot wurde erfolgreich angelegt", "type" => "success"]);

    $this->handleFileUploads($request, $location);

    return redirect()->route("sightseeingspot.edit", $sightseeingspot->id);
  }

  public function edit(Request $request, SightseeingSpot $sightseeingspot) {
    return view("locations.sightseeing.form", [
      "parishes" => Parish::all(),
      "sightseeingspot" => $sightseeingspot,
      "location" => $sightseeingspot->location,
      "images" => $this->getLocationImages($sightseeingspot->location->id)
    ]);
  }

  public function edit_submit(Request $request, SightseeingSpot $sightseeingspot) {
    $this->validateLocation($request);
    $request->validate($this->rules());
    $data = $this->prepareData($request);

    $sightseeingspot->location->update($data);
    $sightseeingspot->update($data);

    $this->handleFileUploads($request, $sightseeingspot->location);

    $request->session()->flash("alert", ["message" => "Der Sightseeing Spot wurde erfolgreich aktualisiert", "type" => "success"]);

    return redirect()->route("sightseeingspot.edit", $sightseeingspot->id);
  }
}
