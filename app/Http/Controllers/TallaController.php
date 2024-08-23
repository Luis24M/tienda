<?php

namespace App\Http\Controllers;

use App\Models\Talla;
use Illuminate\Http\Request;

class TallaController extends Controller
{
    public function index()
    {
        $tallas = Talla::all();
        return view('tallas.index', compact('tallas'));
    }

    public function create()
    {
        return view('tallas.form');
    }

    public function store(Request $request)
    {
        Talla::create($request->all());
        return redirect()->route('tallas.index');
    }

    public function show(Talla $talla)
    {
        return view('tallas.show', compact('talla'));
    }

    public function edit(Talla $talla)
    {
        return view('tallas.form', compact('talla'));
    }

    public function update(Request $request, Talla $talla)
    {
        $talla->update($request->all());
        return redirect()->route('tallas.index');
    }

    public function destroy(Talla $talla)
    {
        $talla->delete();
        return redirect()->route('tallas.index');
    }
}
