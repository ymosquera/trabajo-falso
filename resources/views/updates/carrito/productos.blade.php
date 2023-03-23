@extends('layouts.carrito.appprd')
@section('title', 'PRODUCTOS')

@section('content')
    <main>
        <div class="container-options">
            <div class="barra-busqueda">
                <form action="{{route('shop')}}" method="GET">
                    <input type="text" placeholder="¿Qué deseas buscar...?" name="texto" autocomplete="off">
                    <button type="submit">Buscar</button>
                </form>
            </div>
        </div>
        <div class="card-container">
            @foreach ($producto as $cat)
                <div class="card">
                    <img src="foto/{{$cat->foto}}">
                    <p>
                        {{$cat->nombrep}}<br>
                        {{$cat->precio}}<br>
                        {{$cat->contenido_neto}}
                    </p>
                    <div>
                        <form action="{{route('cart.store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="products_id" id="products_id" value="{{$cat->id_catalogo}}">
                            <button class="add"><i class='bx bx-cart-add' ></i>Añadir al Carrito</button>
                        </form>
                    </div>
                    <div>
                        <form action="{{route('comparar')}}" method="GET">
                            <input type="hidden" name="boton" value="{{$cat->nombrep}}">
                            <button type="submit">Comparar</button>
                        </form>
                    </div>
                    <div>
                        <form action="{{route('grafica.producto',$cat->id_catalogo)}}" method="GET">
                            <button type="submit">ver grafica</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        {{$producto->links()}}
    </main>
@endsection