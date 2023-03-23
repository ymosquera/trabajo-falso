<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <title>SOLTIEND - @yield('title')</title>
</head>
<body>
    <header>
        <div class="logo-container">
            <a href="{{route('home.index')}}">
                <i class='bx bx-store-alt'></i>
                <span>Sol</span>Tiend
            </a>
        </div>
        <div class="navigation-container">
            <div class="links">
            </div>
            <div class="buttons">
                <div class="profile-button">
                    <a href="{{url('editar', auth()->user()->id_usuario)}}"><i class='bx bxs-edit-alt cog'></i>Editar Datos</a>
                </div>
                <div class="logout-button">
                    <a href="{{route('login.destroy')}}"><i class='bx bx-log-out-circle cog'></i>Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </header>
    <div class="navigation-section">
        <div class="picture">
            <div class="circle">
                @if (auth()->check())
                    <img src="perfil/{{auth()->user()->fotop}}">
                @endif
            </div>
            @if (auth()->check())
                <span>{{ auth()->user()->name}}</span>
            @endif
        </div>
        <nav class="navigation-categories">
            <a href="{{route('home.index')}}"><i class='bx bx-home-alt-2' ></i> Inicio</a>
            <a href="{{route('catalogo.index')}}"><i class='bx bxs-coffee-bean' ></i> Catalogo</a>
            <a href="#"><i class='bx bxs-package'></i> Pedidos</a>
            <a href="#"><i class='bx bxs-shopping-bag-alt'></i> Despachos</a>
            <a href="{{route('contacto.index')}}"><i class='bx bxs-contact' ></i> Contacto</a>
        </nav>
    </div>
    {{-- // --}}
    @yield('content')
    @yield('js')
</body>
</html>