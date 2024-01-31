<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;

    protected $table = 'sala';

        //Relacion de muchos a uno
        public function pelicula()
        {
            return $this->belongsTo('App\Models\Pelicula', 'id');
        }

                    //Relacion de muchos a uno
        public function reserva()
        {
            return $this->belongsTo('App\Models\Reserva', 'id_Reserva');
        }
}
