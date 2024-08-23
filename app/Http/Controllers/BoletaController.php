<?php

namespace App\Http\Controllers;

use App\Models\Boleta;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;

class BoletaController extends Controller
{
    public function index()
    {
        $boletas = Boleta::all();
        return view('boletas.index', compact('boletas'));
    }

    public function create()
    {
        return view('boletas.create');
    }

    public function store(Request $request)
    {
        Boleta::create($request->all());
        return redirect()->route('boletas.index');
    }

    public function show(Boleta $boleta)
    {
        $ventas = Venta::where('id_boleta', $boleta->id)->get();
        $productos = Producto::all();
        return view('boletas.show', compact('boleta', 'ventas', 'productos'));
    }

    public function edit(Boleta $boleta)
    {
        return view('boletas.edit', compact('boleta'));
    }

    public function update(Request $request, Boleta $boleta)
    {
        $boleta->update($request->all());
        return redirect()->route('boletas.index');
    }

    public function destroy(Boleta $boleta)
    {
        $boleta->delete();
        return redirect()->route('boletas.index');
    }
}
