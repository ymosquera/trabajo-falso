@extends('layouts.carrito.appcar')
@section('title', 'CARRITO')

@section('content')
    <main>
        @if (count(Cart::getContent()))
            @foreach ($cartCollection as $item)
            @endforeach
                <div class="info-container">
                    <div class="info">
                        <i class='bx bxs-coin-stack'></i><h2>Valor Total:<span>{{Cart::getTotal()}}</span></h2>
                    </div>
                    <form action="{{route('cart.clear')}}" method="POST">
                        @csrf
                        <input type="hidden" name="products_id" id="products_id" value="{{$item->id_catalogo}}">
                        <button type="submit"><i class='bx bxs-brush'></i>Vaciar Carrito</button>
                    </form>
                </div>
            <div class="card-container">
                @foreach ($cartCollection as $cat)
                    <div class="card">
                        <img src="foto/{{$cat->attributes->imagen}}">
                        <p>
                            {{$cat->name}}<br>
                            {{$cat->price}}<br>
                            {{$cat->attributes->descripcion}}<br>
                            <b>Cantidad: {{$cat->quantity}}</b>
                        </p>
                        <div class="cart-buttons">
                            <div class="edit">
                                <form action="{{route('cart.update')}}" method="POST">
                                    @csrf
                                    <div class="input-field">
                                        <input type="hidden" name="id" id="id" value="{{$cat->id}}">
                                        <input type="number" name="quantity" min="1" value="{{$cat->quantity}}" autocomplete="off">
                                    </div>
                                    <div class="edit-button">
                                        <button class="check"><i class='bx bxs-check-circle'></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="remove">
                                <form action="{{route('cart.remove')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$cat->id}}">
                                    <button class="delete"><i class='bx bxs-x-circle'></i>Remover</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <table>
                <tbody>
                    <form action="{{route('factura.save')}}" method="POST">
                        @csrf
                        @foreach ($cartCollection as $prod)
                        <tr>
                            <input type="hidden" name="id[]" value="{{$prod->id}}">
                            <input type="hidden" name="cliente_id" value="{{auth()->user()->id_usuario}}">
                            <input type="hidden" name="total_prod[]" value="{{$prod->price * $prod->quantity}}">
                            <input type="hidden" name="cantidad[]" value="{{$prod->quantity}}">
                            <input type="hidden" name="id_tendero[]" value="{{$prod->attributes->id_tendero}}"><br>
                        </tr>
                        @endforeach
                        <input type="hidden" name="total" value="{{Cart::getTotal()}}">
                        <button type="submit">Factura</button>
                    </form>
                </tbody>
            </table>
        @else
            <div class="empty">
                <h1>!Carrito Vacio!</h1>
            </div>
        @endif
    </main>
@endsection