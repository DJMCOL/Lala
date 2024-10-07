<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TallerPurchase extends Model
{
    protected $table = "taller_purchase";
    protected $primaryKey = "id";

    protected $fillable = [
        'user_id',
        'taller_id',
        'reference',
        'date',
        'date_buy',
        'total',
        'status',
        'validate',
    ];
    public function taller()
    {
        return $this->belongsTo('App\Models\Talleres','taller_id');
    }
}
