<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HourSchedule2 extends Model
{
    protected $table = "hour_schedule_2";
    protected $primaryKey = "id";

    protected $fillable = [
        'name',
        'hour',
    ];
}
