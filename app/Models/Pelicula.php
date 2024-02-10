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
        public function categoria()
        {
            return $this->belongsTo('App\Models\Categoria', 'id_Categoria');
        }

        //Relacion de muchos a uno
        public function nacionalidad()
        {
            return $this->belongsTo('App\Models\Nacionalidad', 'id_Nacionalidad_Pel');
        }

        //Relacion de muchos a uno
        public function idioma()
        {
            return $this->belongsTo('App\Models\Idioma', 'id_Idioma');
        }

        //Relacion de muchos a uno
        public function tipo()
        {
            return $this->belongsTo('App\Models\Tipo', 'id_Tipo');
        }

        //Relacion de muchos a uno
        public function restriccion()
        {
            return $this->belongsTo('App\Models\Restriccion', 'id_Restriccion');
        }

}
