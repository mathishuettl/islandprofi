<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PrebookedActivity;
use App\Parish;
use App\Location;


class PrebookedActivityController extends LocationController
{
  public function index() {
    return view("locations.prebookedactivity.index", ["prebookedactivities" => PrebookedActivity::all()]);
  }

  public function add() {
    return view("locations.prebookedactivity.form", ["parishes" => Parish::all()]);
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

    $prebookedActivity = PrebookedActivity::create($data);
    $location->update(["spot_id" => $prebookedActivity->id]);
    $request->session()->flash("alert", ["message" => "Die Prebooked Activity wurde erfolgreich angelegt", "type" => "success"]);

    $this->handleFileUploads($request, $location);

    return redirect()->route("prebookedactivity.edit", $prebookedActivity->id);
  }

  public function edit(Request $request, PrebookedActivity $prebookedactivity) {
    return view("locations.prebookedactivity.form", [
      "parishes" => Parish::all(),
      "prebookedactivity" => $prebookedactivity,
      "location" => $prebookedactivity->location,
      "images" => $this->getLocationImages($prebookedactivity->location->id)
    ]);
  }

  public function edit_submit(Request $request, PrebookedActivity $prebookedactivity) {
    $this->validateLocation($request);
    $request->validate($this->rules());
    $data = $this->prepareData($request);

    $prebookedactivity->location->update($data);
    $prebookedactivity->update($data);

    $this->handleFileUploads($request, $prebookedactivity->location);

    $request->session()->flash("alert", ["message" => "Die Prebooked Activity wurde erfolgreich aktualisiert", "type" => "success"]);

    return redirect()->route("prebookedactivity.edit", $prebookedactivity->id);
  }
}
