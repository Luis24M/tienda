<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Carrito;
use App\Models\Producto;
use App\Models\Boleta;
use App\Models\Stock;
use Illuminate\Http\Request;
use PDF;

class VentaController extends Controller
{
    public function index()
    {
        $carrito = session('carrito');
        $productos = Producto::all();
        $ventas = Venta::all();
        return view('ventas.boleta', compact('carrito', 'productos', 'ventas'));
    }


    public function efectuarVenta(Request $request)
    {
        $request->validate([
            'evidencia_pago' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Subir la imagen al storage
        if ($request->hasFile('evidencia_pago')) {
            $path = $request->file('evidencia_pago')->store('evidencias_pago', 'public');
        } else {
            return redirect()->back()->with('error', 'La imagen no se pudo cargar.');
        }

        $carrito = session('carrito');

        // Crear una nueva boleta
        $boleta = Boleta::create([
            'codigo' => 'BOL-' . now()->timestamp,
            'fecha' => now(),
            'id_vendedor' => auth()->id(),
            'total' => 0, // Se calculará después
        ]);

        //verificar $boleta->id

        $total = 0;

        foreach ($carrito as $id => $producto) {
            $venta = Venta::create([
                'id_producto' => $id,
                'cantidad' => $producto['cantidad'],
                'evidencia_pago' => $path,
                'id_boleta' => $boleta->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $total += $producto['cantidad'] * $producto['precio'];
            $id_talla = Producto::find($id)->id_talla;
            // Actualizar el stock del producto
            $stock = Stock::where('id_producto', $id)
                ->where('id_talla', $id_talla) // Asegúrate de que el carrito contenga la talla seleccionada
                ->first();

            if ($stock) {
                $stock->cantidad -= $producto['cantidad']; // Disminuir el stock
                $stock->save(); // Guardar los cambios
            }
        }

        // Actualizar el total de la boleta
        $boleta->update(['total' => $total]);

        // Limpiar el carrito
        session()->forget('carrito');

        return redirect()->route('boletas.show', $boleta)->with('success', 'Venta efectuada exitosamente.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'evidencia_pago' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('evidencia_pago')) {
            $path = $request->file('evidencia_pago')->store('evidencias_pago', 'public');
        } else {
            return redirect()->back()->with('error', 'La imagen no se pudo cargar.');
        }

        $carrito = session('carrito');
        
        foreach ($carrito as $id => $detalles) {
            Venta::create([
                'id_producto' => $id,
                'cantidad' => $detalles['cantidad'],
                'evidencia_pago' => $path,
            ]);
        }

        session()->forget('carrito');
        return redirect()->route('ventas.index')->with('success', 'Compra realizada con éxito.');
    }

    public function descargarBoleta(Boleta $boleta)
    {
        $ventas = Venta::where('id_boleta', $boleta->id)->get();
        $pdf = PDF::loadView('boletas.pdf', compact('ventas'));
        // retorne el PDF como descarga y regresa a la vista de ventas
        return $pdf->download('boleta_venta_' . now()->timestamp . '.pdf');
    }

    public function create()
    {
        return view('ventas.create');
    }

    public function show(Venta $venta)
    {
        return view('ventas.show', compact('venta'));
    }

    public function edit(Venta $venta)
    {
        return view('ventas.form', compact('venta'));
    }

    public function update(Request $request, Venta $venta)
    {
        $venta->update($request->all());
        return redirect()->route('ventas.boleta');
    }

    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect()->route('ventas.boleta');
    }
}
