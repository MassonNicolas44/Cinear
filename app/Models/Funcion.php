<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcion extends Model
{
    use HasFactory;

    protected $table = 'funcion';

        //Relacion de uno a muchos
        public function reserva()
        {
            return $this->HasMany('App\Models\Reserva');
        }

        //Relacion de muchos a uno
        public function pelicula()
        {
            return $this->belongsTo('App\Models\Pelicula', 'id_Pelicula');
        }

        //Relacion de muchos a uno
        public function sala()
        {
            return $this->belongsTo('App\Models\Sala', 'id_Sala');
        }

}
