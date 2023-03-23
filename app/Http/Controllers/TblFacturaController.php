<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tbl_Factura;
// use App\Models\Tbl_Factura_Producto;
use PDF;

class TblFacturaController extends Controller{
    public function store(Request $request){
        $factura = request()->except('id','total_prod','cantidad','id_tendero','_token');
        Tbl_Factura::create($factura);
        // //
        $id_producto = $request->id;
        $total_prod  = $request->total_prod;
        $cantidad    = $request->cantidad;
        $id_tendero  = $request->id_tendero;
        $id_factura = tbl_Factura::max('id_factura');
        // //
        for ($i=0; $i<count($id_producto) ; $i++) {
            $datasave = [
                'producto_id' => $id_producto[$i],
                'total_producto' => $total_prod[$i],
                'cantidad' => $cantidad[$i],
                'factura_id' => $id_factura,
                'tendero_id' => $id_tendero[$i],
            ];
            DB::table('tbl_factura_producto')->insert($datasave);
        }
        return redirect()->back();
    }
    public function pdf(){
        $id_factura = tbl_Factura::max('id_factura');
        $factura = DB::table('tbl_factura')
            ->select('id_factura','total','tbl_factura.created_at')
            ->where('id_factura','=',$id_factura)
            ->get();
        //     //
        $factura_producto = DB::table('tbl_factura_producto')
            ->select('id_factura_producto','total_producto','cantidad','tendero_id','producto_id','factura_id','tbl_catalogo.nombrep','tbl_catalogo.contenido_neto','tbl_catalogo.precio','tbl_usuario.name','tbl_usuario.rol_id')
            ->join('tbl_factura','tbl_factura_producto.factura_id','=','tbl_factura.id_factura')
            ->join('tbl_catalogo','tbl_factura_producto.producto_id','=','tbl_catalogo.id_catalogo')
            ->join('tbl_usuario','tbl_factura_producto.tendero_id','=','tbl_usuario.id_usuario')
            ->where('factura_id','=',$id_factura)
            ->get();
        //     //
        $pdf = PDF::loadview('updates.pdf.pdf',['factura'=>$factura,'factura_producto'=>$factura_producto]);
        return $pdf->stream();
    }
}
