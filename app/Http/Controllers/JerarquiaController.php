<?php

namespace App\Http\Controllers;

use App\Models\Jerarquia;
use Illuminate\Http\Request;

class JerarquiaController extends Controller
{
    public function index()
    {
        $jerarquias = Jerarquia::all();
        return view('jerarquias.index', compact('jerarquias'));
    }

    public function create()
    {
        return view('jerarquias.form');
    }

    public function store(Request $request)
    {
        Jerarquia::create($request->all());
        return redirect()->route('jerarquias.index');
    }

    public function show(Jerarquia $jerarquia)
    {
        return view('jerarquias.show', compact('jerarquia'));
    }

    public function edit(Jerarquia $jerarquia)
    {
        return view('jerarquias.form', compact('jerarquia'));
    }

    public function update(Request $request, Jerarquia $jerarquia)
    {
        $jerarquia->update($request->all());
        return redirect()->route('jerarquias.index');
    }

    public function destroy(Jerarquia $jerarquia)
    {
        $jerarquia->delete();
        return redirect()->route('jerarquias.index');
    }
}
