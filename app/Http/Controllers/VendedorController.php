<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
    public function index()
    {
        $vendedores = Vendedor::all();
        return view('vendedores.index', compact('vendedores'));
    }

    public function create()
    {
        return view('vendedores.form');
    }

    public function store(Request $request)
    {
        Vendedor::create($request->all());
        return redirect()->route('vendedores.index');
    }

    public function show(Vendedor $vendedor)
    {
        return view('vendedores.show', compact('vendedor'));
    }

    public function edit(Vendedor $vendedor)
    {
        return view('vendedores.form', compact('vendedor'));
    }

    public function update(Request $request, Vendedor $vendedor)
    {
        $vendedor->update($request->all());
        return redirect()->route('vendedores.index');
    }

    public function destroy(Vendedor $vendedor)
    {
        $vendedor->delete();
        return redirect()->route('vendedores.index');
    }
}

