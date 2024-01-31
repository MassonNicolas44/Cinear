<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparto extends Model
{
    use HasFactory;

    protected $table = 'reparto';

        //Relacion de muchos a uno
        public function pelicula()
        {
            return $this->belongsTo('App\Models\Pelicula', 'id');
        }

        //Relacion de muchos a uno
        public function actor()
        {
            return $this->belongsTo('App\Models\Actor', 'id');
        }


}
