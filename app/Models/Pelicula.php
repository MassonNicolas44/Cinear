<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    protected $table = 'pelicula';

        //Relacion de uno a muchos
        public function sala()
        {
            return $this->HasMany('App\Models\Sala');
        }

        //Relacion de uno a muchos
        public function reparto()
        {
            return $this->HasMany('App\Models\Reparto');
        }

        //Relacion de muchos a uno
        public function nacionalidad()
        {
            return $this->belongsTo('App\Models\Nacionalidad', 'id');
        }

        //Relacion de uno a muchos
        public function categoria()
        {
            return $this->HasMany('App\Models\Categoria');
        }

        //Relacion de uno a muchos
        public function idioma()
        {
            return $this->HasMany('App\Models\Idioma');
        }

        //Relacion de uno a muchos
        public function tipo()
        {
            return $this->HasMany('App\Models\Tipo');
        }
}
