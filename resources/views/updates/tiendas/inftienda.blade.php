@extends('layouts.tiendas.appinftda')
@section('title', 'TIENDA')

@section('content')
    <main>
        <div class="info-tienda">
            @foreach ($tendero as $pers)
                <img src="/perfil/{{$pers->fotop}}">
                <div class="text-tienda">
                    <p>{{$pers->name}}</p>
                    <p>{{$pers->email}}</p>
                </div>
            @endforeach
        </div>
        <div class="card-container">
            @foreach ($producto as $item)
                <div class="card">
                    <img src="/foto/{{$item->foto}}">
                    <p>
                        {{$item->nombrep}}<br>
                        {{$item->precio}}<br>
                        {{$item->contenido_neto}}
                    </p>
                    <div>
                        <form action="{{route('cart.store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="products_id" id="products_id" value="{{$item->id_catalogo}}">
                            <button class="add"><i class='bx bx-cart-add' ></i>Añadir al Carrito</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection