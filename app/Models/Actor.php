<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    protected $table = 'actor';

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
}
