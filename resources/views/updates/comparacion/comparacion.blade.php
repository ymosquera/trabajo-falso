@extends('layouts.carrito.appcom')
@section('title' , 'COMPARACION')
@section('content')
    <main>
        <div class="title">
            <h1>Productos Comparados</h1>
        </div>
        <div class="card-container">
            @foreach ($producto1 as $item1)
                <div class="card">
                    <img src="/foto/{{$item1->foto}}">
                    <p>
                        {{$item1->nombrep}}<br>
                        {{$item1->precio}}<br>
                        {{$item1->contenido_neto}}
                    </p>
                    <div>
                        <form action="{{route('cart.store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="products_id" id="products_id" value="{{$item1->id_catalogo}}">
                            <button class="add"><i class='bx bx-cart-add' ></i>Añadir al Carrito</button>
                        </form>
                    </div>
                </div>
                <p class="text-hidden">{{$var1 = $item1->precio}}</p>
            @endforeach
            {{-- // --}}
                @foreach ($producto2 as $var)
                @endforeach
                <p class="text-hidden">{{$var2 = $var->precio}}</p>
            {{-- // --}}
            @if ($var1 < $var2)
                <span> <i class='bx bxs-chevron-left' ></i> </span>
            @elseif ($var1 == $var2)
                <span> <i> = </i> </span>
            @else
                <span> <i class='bx bxs-chevron-right'></i> </span>
            @endif
            {{-- // --}}
            @foreach ($producto2 as $item2)
                <div class="card">
                    <img src="/foto/{{$item2->foto}}">
                    <p>
                        {{$item2->nombrep}}<br>
                        {{$item2->precio}}<br>
                        {{$item2->contenido_neto}}
                    </p>
                    <div>
                        <form action="{{route('cart.store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="products_id" id="products_id" value="{{$item2->id_catalogo}}">
                            <button class="add"><i class='bx bx-cart-add' ></i>Añadir al Carrito</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection