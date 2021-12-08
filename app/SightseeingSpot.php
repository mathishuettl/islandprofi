<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SightseeingSpot extends Model
{
  protected $fillable = [
    "location_id",
    "description",
    "contact"
  ];

  public function location() {
    return $this->belongsTo(Location::class);
  }
}
