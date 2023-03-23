@extends('layouts.auths.appsig')
@section('title', 'REGISTRO')

@section('content')
    <div class="form-container-r">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
                <h2>Registro</h2>
            </div>
            <div class="inputs-container">
                <div class="input-field-r">
                    <i class='bx bxs-user'></i>
                    <input type="text" placeholder="Nombre" name="name" autocomplete="off">
                </div>
                <div class="input-field-r">
                    <i class='bx bxs-envelope' ></i>
                    <input type="email" placeholder="Correo Electrónico" name="email" autocomplete="off">
                </div>
            </div>
            <div class="inputs-container">
                <div class="input-field-r">
                    <i class='bx bxs-group'></i>
                    <select name="rol_id">
                        <option value="">Elegir Rol</option>
                        @foreach ($rol as $item)
                            <option value="{{$item['id_rol']}}">{{$item['rol']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-field-r">
                    <i class='bx bx-upload'></i>
                    <input type="file" accept=".jpg,.png" name="fotop">
                </div>
            </div>
            <div class="inputs-container sub-r">
                <div class="input-field-r">
                    <i class='bx bxs-lock-alt' ></i>
                    <input type="password" placeholder="Contraseña" name="password">
                </div>
                <div class="input-field-r">
                    <i class='bx bxs-lock-alt' ></i>
                    <input type="password" placeholder="Confirmar Contraseña" name="password_confirmation">
                </div>
            </div>
            <div class="button-form">
                <button type="submit" class="login"><i class='bx bxs-user-plus'></i>Registrarme</button>
            </div>
        </form>
        <div class="login-signup">
            <span class="text">¿Ya tienes una cuenta?
                <a href="{{route('login.index')}}">Iniciar Sesión</a>
            </span>
        </div>
    </div>
@endsection