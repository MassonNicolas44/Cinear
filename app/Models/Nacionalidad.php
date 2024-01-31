<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nacionalidad extends Model
{
    use HasFactory;

    protected $table = 'nacionalidad';

        //Relacion de uno a muchos
        public function nacionalidad()
        {
            return $this->HasMany('App\Models\Nacionalidad');
        }
}
