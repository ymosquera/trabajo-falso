<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_catalogo;
use App\Models\User;

class ProductoController extends Controller{
    public function index($id){
        $datos['producto'] = tbl_catalogo::where('usuario_id', $id)->get();
        $user['tendero'] = User::where('id_usuario', $id)->get();
        return view('updates.tiendas.inftienda', $datos, $user);
    }
}
