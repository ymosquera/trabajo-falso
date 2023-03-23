@extends('layouts.auths.applog')
@section('title', 'INICIO DE SESIÓN')

@section('content')
    <div class="form-container-l">
        <form action="" method="POST">
            @csrf
            <div class="title">
                <h2>Inicio de Sesión</h2>
            </div>
            <div class="input-field-l">
                <i class='bx bxs-envelope'></i>
                <input type="email" placeholder="Correo Electrónico" name="email" autocomplete="off">
            </div>
            <div class="input-field-l sub-l">
                <i class='bx bxs-lock-alt' ></i>
                <input type="password" placeholder="Contraseña" name="password">
            </div>
            <div class="button-form">
                <button type="submit" class="login"><i class='bx bx-log-in-circle'></i>Iniciar Sesión</button>
            </div>
        </form>
        <div class="login-signup">
            <span class="text">¿No tienes una cuenta?
                <a href="{{route('register.index')}}">Crear Cuenta</a>
            </span>
        </div>
    </div>
@endsection