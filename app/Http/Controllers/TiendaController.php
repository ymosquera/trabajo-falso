<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TiendaController extends Controller{
    public function index(Request $request){
        $texto = trim($request->get('texto'));
        $tiendas = DB::table('tbl_usuario')
                    ->select('id_usuario','name','email','fotop')
                    ->where('name','LIKE','%'.$texto.'%')
                    ->where('rol_id', '!=', 1)
                    ->orderBy('id_usuario','asc')
                    ->paginate(12);
        return view('updates.tiendas.tiendas', compact('tiendas','texto'));
    }
}
