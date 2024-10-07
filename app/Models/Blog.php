<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\services\FechaPost;

class Blog extends Model
{
  protected $table = "blog";
  protected $appends = ['first_name'];
  protected $primaryKey = "id";

  public function getFirstNameAttribute($value)
  {
    return $this->attributes['first_name'] = 'hola';
  }
}

