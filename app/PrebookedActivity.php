<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrebookedActivity extends Model
{
  protected $fillable = [
    "location_id",
    "description",
    "contact",
    "ek",
    "vk",
    "information",
    "bring"
  ];

  public function location() {
    return $this->belongsTo(Location::class);
  }
}
