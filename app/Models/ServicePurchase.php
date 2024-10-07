<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePurchase extends Model
{
    protected $table = "service_purchase";
    protected $primaryKey = "id";

    protected $fillable = [
        'user_id',
        'service_id',
        'reference',
        'date',
        'clock',
        'date_buy',
        'total',
        'status',
        'validate',
        'validate_date',
        'created',
    ];

    public function service() {
        return $this->belongsTo('App\Models\Asesorias','service_id');
    }
    public function hour() {
        return $this->belongsTo('App\Models\HourSchedule','clock');
    }
}
