<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boleta de Compra</title>
    <style>
        /* Agrega estilos aquí si es necesario */
    </style>
</head>
<body>
    <h2>Boleta de Compra</h2>

    <h2 class="text-3xl">Boleta de Compra</h2>

    <table class="table-auto w-1/2 border my-5">
        <thead>
            <tr>
                <th class="px-4 py-2">Producto</th>
                <th class="px-4 py-2">Cantidad</th>
                <th class="px-4 py-2">Precio</th>
                <th class="px-4 py-2">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $venta)
                <tr>
                    <td class="border px-4 py-2">{{ $venta->producto->nombre }}</td>
                    <td class="border px-4 py-2">{{ $venta->cantidad }}</td>
                    <td class="border px-4 py-2">{{ $venta->producto->precio }}</td>
                    <td class="border px-4 py-2">{{ $venta->cantidad * $venta->producto->precio }}</td>
                </tr>
            @endforeach
            <tr>
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
</body>
</html>
