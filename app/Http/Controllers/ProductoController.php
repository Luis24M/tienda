<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Jerarquia;
use App\Models\Talla;
use App\Models\Stock;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function admin(){
        $productos = Producto::all();
        return view('productos.admin', compact('productos'));
    }

    public function index(Request $request)
{
    // Obtener solo los productos con stock disponible
    $stocks = Stock::where('cantidad', '>', 0)->get();
    $productos = Producto::whereIn('id', $stocks->pluck('id_producto'));

    // Aplicar filtros según los parámetros recibidos
    if ($request->categoria && $request->categoria != 0) {
        $productos->where('id_categoria', $request->categoria);
    }

    if ($request->talla && $request->talla != 0) {
        $productos->where('id_talla', $request->talla);
    }

    if ($request->jerarquia && $request->jerarquia != 0) {
        $productos->where('id_jerarquia', $request->jerarquia);
    }

    if ($request->orden) {
        switch ($request->orden) {
            case 1:
                $productos->orderBy('nombre');
                break;
            default:
                $productos->orderBy('precio');
                break;
        }
    }

    // Ejecutar la consulta para obtener los productos filtrados
    $productos = $productos->get();

    // Obtener las categorías, tallas y jerarquías para los filtros
    $categorias = Categoria::all();
    $tallas = Talla::all();
    $jerarquias = Jerarquia::all();

    // Devolver la vista con los productos filtrados y los filtros disponibles
    return view('productos.index', compact('productos', 'categorias', 'tallas', 'jerarquias'));
}


    public function create()
    {
        $categorias = Categoria::all();
        $tallas = Talla::all();
        $jerarquias = Jerarquia::all();
        return view('productos.form', compact('categorias', 'tallas', 'jerarquias'));
    }

    public function store(Request $request)
    {
        // Validar los datos recibidos
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'id_talla' => 'required|integer',
            'id_categoria' => 'required|integer',
            'id_jerarquia' => 'required|integer',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Manejar la subida de la imagen
        if ($request->hasFile('imagen')) {
            $fileName = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('images/productos'), $fileName);
            $data['imagen'] = $fileName;
        }

        // calcular el precio del producto jerarquia x categoria
        $jerarquia = Jerarquia::find($data['id_jerarquia']);
        $categoria = Categoria::find($data['id_categoria']);
        $data['precio'] = $jerarquia->valor * $categoria->valor;

        // Crear el producto
        Producto::create($data);

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    public function show(Producto $producto)
{
    // Cargar las relaciones necesarias para el producto
    $producto = Producto::with('talla', 'categoria', 'jerarquia')->findOrFail($producto->id);

    // Obtener todos los productos que coincidan en nombre, categoría y jerarquía
    $productos_similares = Producto::where('nombre', $producto->nombre)
        ->where('id_categoria', $producto->id_categoria)
        ->where('id_jerarquia', $producto->id_jerarquia)
        ->get();

    // Obtener las tallas disponibles para estos productos
    $tallas = Talla::whereIn('id', Stock::whereIn('id_producto', $productos_similares->pluck('id'))
        ->where('cantidad', '>', 0)
        ->pluck('id_talla'))
        ->get();

    return view('productos.show', compact('producto', 'tallas', 'productos_similares'));
}


    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        $tallas = Talla::all();
        $jerarquias = Jerarquia::all();
        return view('productos.form', compact('producto', 'categorias', 'tallas', 'jerarquias'));
    }

    public function update(Request $request, Producto $producto)
    {
        // Validar los datos recibidos
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'id_talla' => 'required|integer',
            'id_categoria' => 'required|integer',
            'id_jerarquia' => 'required|integer',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Manejar la subida de la nueva imagen
        if ($request->hasFile('imagen')) {
            // Borrar la imagen anterior si existe
            if ($producto->imagen) {
                unlink(public_path('images/productos/' . $producto->imagen));
            }

            $fileName = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('images/productos'), $fileName);
            $data['imagen'] = $fileName;
        }

        // calcular el precio del producto jerarquia x categoria
        $jerarquia = Jerarquia::find($data['id_jerarquia']);
        $categoria = Categoria::find($data['id_categoria']);
        $data['precio'] = $jerarquia->valor * $categoria->valor;

        // Actualizar el producto con los nuevos datos
        $producto->update($data);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index');
    }
}
