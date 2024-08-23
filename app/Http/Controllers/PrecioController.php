<?php

namespace App\Http\Controllers;

use App\Models\Precio;
use Illuminate\Http\Request;

class PrecioController extends Controller
{
    public function index()
    {
        $precios = Precio::all();
        return view('precio.index', compact('precios'));
    }

    public function create()
    {
        return view('precio.create');
    }

    public function store(Request $request)
    {
        Precio::create($request->all());
        return redirect()->route('precio.index');
    }

    public function show(Precio $precio)
    {
        return view('precio.show', compact('precio'));
    }

    public function edit(Precio $precio)
    {
        return view('precio.edit', compact('precio'));
    }

    public function update(Request $request, Precio $precio)
    {
        $precio->update($request->all());
        return redirect()->route('precio.index');
    }

    public function destroy(Precio $precio)
    {
        $precio->delete();
        return redirect()->route('precio.index');
    }
}
