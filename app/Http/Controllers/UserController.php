<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function Laravel\Prompts\error;
use function Laravel\Prompts\password;

class UserController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            'email' => 'required|unique:users|email',
            'age' => 'required|numeric',
            'password' => 'required|max:2048|confirmed'
        ]);
    }
}
