@extends('layouts.layout')

@section('content')
    <h2 class="text-3xl">Boleta de Compra</h2>

    <table class="table-auto w-1/2 border my-5">
        <thead>
            <tr>
                <th class="px-4 py-2">Producto</th>
                <th class="px-4 py-2">Talla</th>
                <th class="px-4 py-2">Color</th>
                <th class="px-4 py-2">Cantidad</th>
                <th class="px-4 py-2">Precio</th>
                <th class="px-4 py-2">Subtotal</th>
                <th class="px-4 py-2">Evidencia Pago</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $venta)
                <tr>
                    <td class="border px-4 py-2">{{ $venta->producto->nombre }}</td>
                    <td class="border px-4 py-2">{{ $venta->producto->talla->nombre }}</td>
                    <td class="border px-4 py-2">{{ $venta->producto->color }}</td>
                    <td class="border px-4 py-2">{{ $venta->cantidad }}</td>
                    <td class="border px-4 py-2">{{ $venta->producto->precio }}</td>
                    <td class="border px-4 py-2">{{ $venta->cantidad * $venta->producto->precio }}</td>
                    <td class="border px-4 py-2">
                      <img src="{{ asset('storage/' . $venta->evidencia_pago) }}" alt="Evidencia de Pago" style="max-width: 200px;"></td>
                  </tr>
            @endforeach
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td class="border px-4 py-2">Total: 
                @php
                  $total = 0;
                  foreach ($ventas as $venta) {
                    $total += $venta->cantidad * $venta->producto->precio;
                  }
                  echo $total;
                @endphp
              </td>
            </tr>
          </tbody>
    </table>
    
    <div class="mt-4">
        <a href="{{ route('boletas.pdf', $boleta) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Descargar Boleta</a>
    </div>
@endsection
