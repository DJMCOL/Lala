<?php


namespace App\Services;


use Carbon\Carbon;

class FechaPost
{
  static public function Date($fecha = null): string{
    Carbon::now()->diffForHumans($fecha);
    return 'hola mundo';
  }
}