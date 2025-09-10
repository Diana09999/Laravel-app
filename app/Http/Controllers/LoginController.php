<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        $data = [
            'title' => 'Inscription - '.config('app.name'),
            'description' => 'Inscription sur le site -'.config('app.name'),
        ];
        return view('auth.login', $data);
    }
    public function login(){
        return 'je suis connecté';
    }
}
