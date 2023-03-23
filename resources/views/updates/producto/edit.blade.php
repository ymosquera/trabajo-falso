@extends('layouts.producto.appcre')
@section('title', 'EDITAR PRODUCTO')

@section('content')
    <main>
        <div class="form-container">
            <form action="{{url('catalogo/'.$catalogo->id_catalogo)}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{method_field('PATCH')}}
                <div class="title">
                    <h2>Editar Producto</h2>
                </div>
                <div class="input-field">
                    <i class='bx bxs-cookie'></i>
                    <input type="text" name="nombrep" value="{{$catalogo->nombrep}}" autocomplete="off">
                </div>
                <div class="input-field">
                    <i class='bx bxs-dollar-circle'></i>
                    <input type="text" name="precio" value="{{$catalogo->precio}}" autocomplete="off">
                </div>
                <div class="input-field">
                    <i class='bx bxs-cylinder'></i>
                    <input type="text" name="contenido_neto" value="{{$catalogo->contenido_neto}}" autocomplete="off">
                </div>
                <div class="input-field">
                    <i class='bx bx-upload'></i>
                    <input type="file" name="foto" accept=".jpg,.png">
                </div>
                <div class="buttons-form">
                    <button type="submit" class="check"><i class='bx bxs-check-circle' ></i>Confirmar</button>
                    <a href="{{route('catalogo.index')}}" class="cancel"><i class='bx bxs-x-circle' ></i>Cancelar</a>
                </div>
            </form>
        </div>
    </main>
@endsection