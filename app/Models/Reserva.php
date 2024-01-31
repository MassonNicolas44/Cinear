<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reserva';

        //Relacion de uno a muchos
        public function sala()
        {
            return $this->HasMany('App\Models\Sala');
        }
}
