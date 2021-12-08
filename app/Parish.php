<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parish extends Model
{
  protected $fillable = ["title", "region_id"];

  public function region() {
    return $this->belongsTo(Region::class);
  }
}
