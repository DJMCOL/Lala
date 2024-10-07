<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleService extends Model
{
    protected $table = "schedule_service";
    protected $primaryKey = "id";

    protected $fillable = [
        'date',
        'hour',
        'hour_end',
    ];
}
