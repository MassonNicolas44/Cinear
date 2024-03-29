<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reserva';

        //Relacion de muchos a uno
        public function funcion()
        {
            return $this->belongsTo('App\Models\Funcion', 'id_Funcion');
        }

}
