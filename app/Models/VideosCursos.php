<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideosCursos extends Model
{
  protected $table = "cursos_video";
  protected $primaryKey = "id";

  public function Cursos(){
    return $this->belongsTo('App\Models\Cursos');
  }
}