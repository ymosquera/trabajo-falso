<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/inftienda.css')}}">
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
                <a href="{{route('cart.index')}}" class="cart"><i class='bx bx-cart-alt'></i>{{Cart::getTotalQuantity()}}</a>
                <div class="profile-button">
                    <a href="{{url('editar', auth()->user()->id_usuario)}}"><i class='bx bxs-edit-alt cog'></i>Editar Datos</a>
                </div>
                <div class="logout-button">
                    <a href="{{route('login.destroy')}}"><i class='bx bx-log-out-circle cog'></i>Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </header>
    <nav class="navigation-section">
        <div class="picture">
            <div class="circle">
                @if (auth()->check())
                    <img src="/perfil/{{auth()->user()->fotop}}">
                @endif
            </div>
            @if (auth()->check())
                <span>{{ auth()->user()->name}}</span>
            @endif
        </div>
        <div class="navigation-categories">
            <a href="{{route('home.index')}}"><i class='bx bx-home-alt-2' ></i> Inicio</a>
            <a href="{{route('shop')}}"><i class='bx bxs-coffee-bean' ></i> Productos</a>
            <a href="{{route('tiendas.index')}}"><i class='bx bx-store-alt' ></i> Tiendas</a>
            <a href="#"><i class='bx bx-x' ></i> ?</a>
            <a href="{{route('contacto.index')}}"><i class='bx bxs-contact' ></i> Contacto</a>
        </div>
    </nav>
    {{-- // --}}
    @yield('content')
</body>
</html>