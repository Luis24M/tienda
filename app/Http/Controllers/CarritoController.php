<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Producto;

class CarritoController extends Controller
{
    public function agregar(Request $request)
    {
        // Obtener el producto por ID
        $producto = Producto::find($request->producto_id);

        if(!$producto) {
            return redirect()->back()->with('error', 'Producto no encontrado.');
        }

        // Obtener el carrito de la sesión (o crear uno nuevo si no existe)
        $carrito = session()->get('carrito', []);

        // Si el producto ya está en el carrito, aumentar la cantidad
        if(isset($carrito[$producto->id])) {
            $carrito[$producto->id]['cantidad']++;
        } else {
            // Si no está en el carrito, agregarlo con cantidad 1
            $carrito[$producto->id] = [
                "nombre" => $producto->nombre,
                "cantidad" => 1,
                "precio" => $producto->precio,
                "talla" => $producto->talla->nombre ?? 'Sin talla',
                "color" => $producto->color
            ];
        }

        // Guardar el carrito en la sesión
        session()->put('carrito', $carrito);

        // Redirigir a la página de productos con un mensaje de éxito
        return redirect()->back()->with('success', 'Producto agregado al carrito!');
    }
    
    public function mostrar()
    {
        $carrito = session()->get('carrito');

        return view('carrito.index', compact('carrito'));
    }

    public function quitar(Request $request, $id)
    {
        $carrito = session()->get('carrito');

        if (isset($carrito[$id])) {
            unset($carrito[$id]);
            session()->put('carrito', $carrito);
        }

        return redirect()->back()->with('success', 'Producto quitado del carrito.');
    }


}
