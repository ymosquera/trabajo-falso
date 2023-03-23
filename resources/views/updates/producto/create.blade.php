@extends('layouts.producto.appcre')
@section('title', 'AGREGAR PRODUCTO')

@section('content')
    <main>
        <div class="form-container">
            <form action="{{route('catalogo.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="title">
                    <h2>Agregar Producto</h2>
                </div>
                <div class="input-field">
                    <i class='bx bxs-cookie'></i>
                    <input type="text" placeholder="Nombre Producto" name="nombrep" autocomplete="off">
                    <input type="hidden" name="usuario_id" value="{{auth()->user()->id_usuario}}">
                </div>
                <div class="input-field">
                    <i class='bx bxs-dollar-circle'></i>
                    <input type="text" placeholder="Precio" name="precio" autocomplete="off">
                </div>
                <div class="input-field">
                    <i class='bx bxs-cylinder'></i>
                    <input type="text" placeholder="Contenido Neto" name="contenido_neto" autocomplete="off">
                </div>
                <div class="input-field">
                    <i class='bx bx-upload'></i>
                    <input type="hidden" name="estado" value="DESACTIVADO">
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