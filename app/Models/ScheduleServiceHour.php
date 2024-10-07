<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleServiceHour extends Model
{
    protected $table = "schedule_service_hour";
    protected $primaryKey = "id";

    protected $fillable = [
        'hour_id',
        'schedule_id',
    ];
}
