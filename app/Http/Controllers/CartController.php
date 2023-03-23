<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tbl_Catalogo;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Cart;

class CartController extends Controller{
    public function shop(Request $request){
        $texto = trim($request->get('texto'));
        $producto = DB::table('tbl_catalogo')
                    ->select('id_catalogo','nombrep','precio','contenido_neto','foto','estado')
                    ->where('nombrep','LIKE','%'.$texto.'%')
                    ->where('estado','ACTIVO')
                    ->orderBy('id_catalogo','asc')
                    ->paginate(12);
        return view('updates.carrito.productos', compact('producto','texto'));
    }

    public function cart(){
        $cartCollection = Cart::getContent();
        return view('updates.carrito.carrito')->with(['cartCollection'=>$cartCollection]);
    }

    public function store(Request $request){
        $products = tbl_catalogo::find($request->products_id);
        Cart::add(
            $products->id_catalogo,
            $products->nombrep,
            $products->precio,
            1,
            array('imagen'=>$products->foto,
                'descripcion'=>$products->contenido_neto,
                'id_tendero'=>$products->usuario_id)
        );
        return back();
    }

    public function remove(Request $request){
        // $products = tbl_catalogo::where('id', $request->id_catalogo)->firstOrFail();
        Cart::remove(['id'=>$request->id]);
        return back();
    }

    public function clear(){
        Cart::clear();
        return back();
    }

    public function update(Request $request){
        Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
            ));
        return back();
    }

    public function comparar(Request $request){
        $boton = trim($request->get('boton'));
        $producto = DB::table('tbl_catalogo')
                    ->select('id_catalogo','nombrep','precio','contenido_neto','foto','estado')
                    ->where('nombrep','LIKE','%'.$boton.'%')
                    ->where('estado','ACTIVO')
                    ->orderBy('precio','asc')
                    ->paginate(12);
        return view('updates.carrito.productos', compact('producto','boton'));
    }

    public function grafica(Request $request, $id){

        $chart_options = [
            'chart_title' => 'promedio precio del producto',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Tbl_Catalogo',
            'group_by_field' => 'updated_at',
            'group_by_period' => 'day',
            'aggregate_function' => 'avg',
            'aggregate_field' => 'precio',
            'chart_type' => 'line',



            'conditions'=> [
                ['name' => 'Food', 'condition' => 'id_catalogo ='.$id, 'color' => 'red', 'fill' => true],
              
            ],
          

            
        


        ];

        $chart1 = new LaravelChart($chart_options);
        
        return view('updates.carrito.grafica', compact('chart1'));

    }

}
