<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
  protected $fillable = ["title"];

  public function parishes() {
    return $this->hasMany(Parish::class);
  }
}
