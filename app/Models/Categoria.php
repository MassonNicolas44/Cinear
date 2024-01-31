<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categoria';

        //Relacion de muchos a uno
        public function categoria()
        {
            return $this->belongsTo('App\Models\Categoria', 'id_Categoria');
        }

}
