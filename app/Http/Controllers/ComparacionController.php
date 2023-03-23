<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_catalogo;


class ComparacionController extends Controller{
    public function index(Request $request, $id,$id2){
        $id = $request -> input('var1');
        $id2 = $request -> input('var2');

        $producto1['producto1'] = tbl_catalogo::where('id_catalogo', $id)->get();
        $producto2['producto2'] = tbl_catalogo::where('id_catalogo', $id2)->get();
        return view('updates.comparacion.comparacion', $producto1, $producto2);
    }
}
