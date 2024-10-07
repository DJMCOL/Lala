<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Talleres extends Model
{
  protected $table = "talleres";
  protected $primaryKey = "id";

  public function list_items()
  {
    return $this->belongsTo('App\Models\ItemTalleres','taller_id');
  }
}