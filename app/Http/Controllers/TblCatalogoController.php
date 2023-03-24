<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tbl_Catalogo;
use App\Models\Tbl_Producto_Auditoria;
use Illuminate\Support\Facades\DB;

class TblCatalogoController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $datos['catalogo'] = tbl_catalogo::where('usuario_id', auth()->user()->id_usuario)->get();
        return view('updates.producto.catalogo', $datos);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('updates.producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $datoscatalogo = request()->except('_token');
        //
        if ($imagen = $request->file('foto')) {
            $rutaguardarimg = 'foto/';
            $imagenprod = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaguardarimg, $imagenprod);
            $datoscatalogo['foto'] = $imagenprod;
        }


        //
        tbl_catalogo::create($datoscatalogo);


        $catalogo_id = Tbl_Catalogo::max('id_catalogo');
        // Registrar auditoría
        $auditoria = new Tbl_Producto_Auditoria([
            'catalogo_id' => $catalogo_id,
            'usuario_id' => $request->input('usuario_id'),
            'accion' => 'crear',
            'precio'=> $request->input('precio')
        ]);

        $auditoria->save();

        return redirect()->route('catalogo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tbl_catalogo  $tbl_catalogo
     * @return \Illuminate\Http\Response
     */
    public function show(tbl_catalogo $tbl_catalogo){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tbl_catalogo  $tbl_catalogo
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $catalogo = tbl_catalogo::find($id);
        return view('updates.producto.edit', compact('catalogo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tbl_catalogo  $tbl_catalogo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $datoscatalogo = request()->except(['_token', '_method']);
        //
        if ($imagen = $request->file('foto')) {
            $rutaguardarimg = 'foto/';
            $imagenprod = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaguardarimg, $imagenprod);
            $datoscatalogo['foto'] = $imagenprod;
        } else {
            unset($datoscatalogo['foto']);
        }
        //
        tbl_catalogo::where('id_catalogo', '=', $id)->update($datoscatalogo);
        $auditoria = new Tbl_Producto_Auditoria([
            'catalogo_id' => $id,
            'usuario_id' => $request->input('usuario_id'),
            'accion' => 'actualizar',
            'precio' => $request->input('precio')
        ]);

        $auditoria->save();
        return redirect()->route('catalogo.index');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tbl_catalogo  $tbl_catalogo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //
        tbl_catalogo::destroy($id);
        return redirect()->route('catalogo.index')->with('Eliminado','ok');
    }

    public function cambiarestado($id){
        $product = tbl_catalogo::find($id);
        if ($product->estado == 'ACTIVO'){
            DB::table('tbl_catalogo')->where('id_catalogo',$id)->update(['estado'=>'DESACTIVADO']);
            return redirect()->back();
        } else {
            DB::table('tbl_catalogo')->where('id_catalogo',$id)->update(['estado'=>'ACTIVO']);
            return redirect()->back();
        }
    }
}