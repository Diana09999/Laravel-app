<?php

namespace App\Http\Controllers;

use App\Models\Plat;

class home_controller extends Controller
{
    public function show()
    {
        $plats = Plat::all();

        return view('welcome', compact('plats'));
    }
}
