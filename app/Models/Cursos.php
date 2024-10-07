<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
  protected $table = "cursos";
  protected $primaryKey = "id";

  public function list_items()
  {
    return $this->belongsTo('App\Models\ItemCursos','curso_id');
  }

  public function list_videos()
  {
    return $this->hasMany('App\Models\VideosCursos','curso_id');
  }

  public function list_audios()
  {
    return $this->hasMany('App\Models\AudioCursos','curso_id');
  }

  public function list_pdf()
  {
    return $this->hasMany('App\Models\PdfCursos','curso_id');
  }


}
