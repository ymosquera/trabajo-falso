@extends('layouts.apph')
@section('title', 'INICIO')

@section('content')
    @if (auth()->check())
        @if (auth()->user()->rol_id == 1)
            <main>
                <div class="welcome">
                    <h1>Bienvenid@ a Nuestro Sitio Web</h1>
                </div>
            </main>
        @else
            <main>
                <div class="welcome">
                    <h1>Bienvenid@ {{auth()->user()->name}}</h1>
                </div>
            </main>
        @endif
    @endif
@endsection