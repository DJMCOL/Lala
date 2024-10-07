<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HourSchedule extends Model
{
    protected $table = "hour_schedule";
    protected $primaryKey = "id";

    protected $fillable = [
        'name',
    ];
}