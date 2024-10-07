<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = "users";
    protected $primaryKey = "id";
    public function address()
    {
        return $this->hasMany('App\Models\Address','user_id');
    }
}
