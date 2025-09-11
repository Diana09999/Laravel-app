<?php

namespace App\Http\Controllers;

use App\Models\Plats;
use App\Models\User;

class home_controller
{
    public function show(){
        $plats = Plats::all();

        return view('welcome', compact('plats'));
    }
}
