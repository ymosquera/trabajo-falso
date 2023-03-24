<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class SessionsController extends Controller{
    public function create(){
        return view('auth.login');
    }

    public function store(){
        if (auth()->attempt(request(['email','password'])) == false) {
            return back()->withErrors([
                'message' => 'El correo o contraseña es incorrecto, por favor intente de nuevo',
            ]);
        }
        return redirect()->to('/');
    }

    public function destroy(){
        auth()->logout();

    
        return redirect()->to('/');
    }
}
