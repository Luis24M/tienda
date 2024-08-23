@extends('layouts.layout')

@section('content')
    <h2 class="text-3xl">Tu Carrito</h2>

    @if(session('carrito') && count(session('carrito')) > 0)
        <table class="table-auto w-1/2 border my-5">
            <thead>
                <tr>
                    <th class="px-4 py-2">Producto</th>
                    <th class="px-4 py-2">Talla</th>
                    <th class="px-4 py-2">Cantidad</th>
                    <th class="px-4 py-2">Precio</th>
                    <th class="px-4 py-2">Total</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach(session('carrito') as $id => $detalles)
                    <tr>
                        <td class="border px-4 py-2">{{ $detalles['nombre'] }}</td>
                        <td class="border px-4 py-2">{{ $detalles['talla']}}</td>
                        <td class="border px-4 py-2">{{ $detalles['cantidad'] }}</td>
                        <td class="border px-4 py-2">{{ $detalles['precio'] }}</td>
                        <td class="border px-4 py-2">{{ $detalles['precio'] * $detalles['cantidad'] }}</td>
                        <td class="border px-4 py-2">
                            <form action="{{ route('carrito.quitar', $id) }}" method="POST">
                                @csrf
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="submit">Quitar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Botón para proceder con la compra -->
        <div class="mt-4">
            <a href="{{ route('ventas.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Proceder con la compra</a>
        </div>
    @else
        <p>Tu carrito está vacío.</p>
    @endif
@endsection


<script>
    console.log(@json(session('carrito')));
</script>