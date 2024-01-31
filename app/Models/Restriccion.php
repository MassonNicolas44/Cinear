<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restriccion extends Model
{
    use HasFactory;

    protected $table = 'restriccion';

    
        //Relacion de muchos a uno
        public function restriccion()
        {
            return $this->belongsTo('App\Models\Restriccion', 'id_Restriccion');
        }
}
