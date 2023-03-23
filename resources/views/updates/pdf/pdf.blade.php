<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{public_path('css/pdf.css')}}" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>PDF</title>
</head>
<body>
    <div>
        {{-- // --}}
        @foreach ($factura_producto as $item)
        @endforeach
        @foreach ($factura as $u)
        @endforeach
        {{-- // --}}
        <h1 class="title">FACTURA N° {{$item->factura_id}}</h1>
        <table class="info">
            <tr>
                @if (auth()->check())
                    @if (auth()->user()->rol_id == 1)
                        <td class="name"><span>Factura a: </span> {{auth()->user()->name}}</td>
                    @endif
                @endif
                <td class="date"><span>Fecha Creación: </span>{{ $u->created_at }}</td>
            </tr>
        </table>
        <table class="factura">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nombre Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Descripción</th>
                    <th>Tendero</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($factura_producto as $e)
                    <tr>
                        <td>{{ $e->factura_id}}</td>
                        <td>{{ $e->nombrep }}</td>
                        <td>{{ $e->precio }} $</td>
                        <td>{{ $e->cantidad }}</td>
                        <td>{{ $e->total_producto}} $</td>
                        <td>{{ $e->contenido_neto }}</td>
                        <td>{{ $e->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br><hr>
        <div class="total">
            <p><span>VALOR TOTAL: </span><b>{{ $u->total }}</b></p>
        </div>
    </div>
</body>
</html>