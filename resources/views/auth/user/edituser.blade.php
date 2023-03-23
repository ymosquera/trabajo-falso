@extends('layouts.user.appuser')
@section('title', 'EDITAR DATOS')

@section('content')
    <main>
        <div class="form-container">
            <form action="{{url('editar',$datosperfil->id_usuario)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="title">
                    <h2>Editar Datos</h2>
                </div>
                <div class="input-field">
                    <i class='bx bxs-user'></i>
                    <input type="text" name="name" value="{{$datosperfil->name}}" autocomplete="off">
                </div>
                <div class="input-field">
                    <i class='bx bxs-envelope' ></i>
                    <input type="text" name="email" value="{{$datosperfil->email}}" autocomplete="off">
                </div>
                <div class="input-field">
                    <i class='bx bx-upload'></i>
                    <input type="file" name="fotop">
                </div>
                <div class="buttons-form">
                    <button type="submit" class="check"><i class='bx bxs-check-circle' ></i>Confirmar</button>
                    <a href="{{route('home.index')}}" class="cancel"><i class='bx bxs-x-circle' ></i>Cancelar</a>
                </div>
            </form>
        </div>
    </main>
@endsection