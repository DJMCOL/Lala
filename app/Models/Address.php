<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = "address";
    protected $primaryKey = "id";
    public function City() {
        return $this->belongsTo('App\Models\City', 'city');
    }
    public function State() {
        return $this->belongsTo('App\Models\State', 'state');
    }
}
