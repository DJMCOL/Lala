<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asesorias extends Model
{
  protected $table = "asesorias";
  protected $primaryKey = "id";

  public function list_items()
  {
    return $this->belongsTo('App\Models\ItemAsesorias','curso_id');
  }
}