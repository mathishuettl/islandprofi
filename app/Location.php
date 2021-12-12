<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
  protected $fillable = [
    "parish_id",
    "external_id",
    "name",
    "address",
    "zip",
    "city",
    "4x4_required",
    "lat",
    "lng",
    "type",
    "spot_id"
  ];

  public function parish() {
    return $this->belongsTo(Parish::class);
  }

  public function niceType() {
    switch ($this->type) {
      case "App\SightseeingSpot":
        return "Sightseeing Spot";
      case "App\PrebookedActivity":
        return "Prebooked Activity";
      default:
        return "not defined";
    }
  }

  public function getSpotEditLink() {
    switch ($this->type) {
      case "App\SightseeingSpot":
        return route("sightseeingspot.edit", $this->spot_id);
      case "App\PrebookedActivity":
        return route("prebookedactivity.edit", $this->spot_id);
      default:
        return "unknown";
    }
  }
}
