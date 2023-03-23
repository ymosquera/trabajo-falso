@extends('layouts.tiendas.apptda')
@section('title', 'TIENDAS')

@section('content')
    <main>
        <div class="barra-busqueda">
            <form action="{{route('tiendas.index')}}" method="GET">
                <input type="text" placeholder="¿Qué deseas buscar...?" name="texto" value="{{$texto}}" autocomplete="off">
                <button type="submit">Buscar</button>
            </form>
        </div>
        <div class="card-container">
            @foreach ($tiendas as $shop)
                <a href="{{route('tienda.index',['id' => $shop->id_usuario])}}" class="card">
                    <img src="perfil/{{$shop->fotop}}">
                    <h2>{{$shop->name}}</h2>
                </a>
            @endforeach
        </div>
    </main>
@endsection