<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TIpo extends Model
{
    use HasFactory;

    protected $table = 'tipo';

        //Relacion de muchos a uno
        public function tipo()
        {
            return $this->belongsTo('App\Models\Tipo', 'id_Tipo');
        }
}
