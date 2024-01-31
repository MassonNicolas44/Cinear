<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActorController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }
}
