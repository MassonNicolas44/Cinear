<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;

    protected $table = 'sala';

        //Relacion de uno a muchos
        public function funcion()
        {
            return $this->HasMany('App\Models\Funcion');
        }
}
