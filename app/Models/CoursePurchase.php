<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoursePurchase extends Model
{
    protected $table = "course_purchase";
    protected $primaryKey = "id";
    public function user()
    {
        return $this->belongsTo('App\Models\Users','user_id');
    }
    public function curso()
    {
        return $this->belongsTo('App\Models\Cursos','course_id');
    }
}
