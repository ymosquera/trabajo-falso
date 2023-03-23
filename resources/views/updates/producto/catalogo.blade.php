@extends('layouts.producto.appca')
@section('title', 'CATALOGO')

@section('content')
    <main>
        <div class="button-agregar">
            <a href="{{route('catalogo.create')}}" class="create"><i class='bx bxs-plus-circle'></i>Agregar Producto</a>
        </div>
        <div class="card-container">
            @foreach ($catalogo as $product)
                <div class="card">
                    <img src="foto/{{$product->foto}}" alt="">
                    <p>
                        {{$product->nombrep}}<br>
                        {{$product->precio}}<br>
                        {{$product->contenido_neto}}<br>
                        @if ($product->estado=='ACTIVO')
                            <b><a href="{{route('change.status',$product->id_catalogo)}}">ACTIVO</a></b>
                        @else
                            <b><a href="{{route('change.status',$product->id_catalogo)}}">DESACTIVADO</a></b>
                        @endif
                    </p>
                    <div class="buttons-options">
                        <form action="{{url('/catalogo/'.$product->id_catalogo.'/edit/')}}">
                            <button type="submit" class="edit"><i class='bx bxs-edit'></i></button>
                        </form>
                        <form action="{{url('/catalogo/'.$product->id_catalogo)}}" method="POST" class="form_delete">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit" class="delete"><i class='bx bxs-trash'></i></button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection
@section('js')
    <script src="{{asset('assets/js/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <link href="{{asset('assets/css/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">
    @if(session('Eliminado') == 'ok')
        <script>
            Swal.fire(
                'Eliminado!',
                'El producto se eliminó con exito!',
                'success'
            )
        </script>
    @endif
    <script>
        $('.form_delete').submit(function(e){
            e.preventDefault();
                Swal.fire({
                    title: '¿Estás Seguro?',
                    text: "Se eliminará definitivamente el producto",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed){
                        this.submit();
                    }
                })
            })
    </script>
@endsection