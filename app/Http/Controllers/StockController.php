<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Producto;
use App\Models\Talla;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::all();
        $productos = Producto::all();
        return view('stocks.index', compact('stocks', 'productos'));
    }

    public function create()
    {
        $productos = Producto::all();
        $tallas = Talla::all();
        return view('stocks.form', compact('productos', 'tallas'));
    }

    public function store(Request $request)
    {
        Stock::create($request->all());
        return redirect()->route('stocks.index');
    }

    public function show(Stock $stock)
    {
        return view('stocks.show', compact('stock'));
    }

    public function edit(Stock $stock)
    {
        $productos = Producto::all();
        $tallas = Talla::all();
        return view('stocks.form', compact('stock', 'productos', 'tallas'));
    }

    public function update(Request $request, Stock $stock)
    {
        $stock->update($request->all());
        return redirect()->route('stocks.index');
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect()->route('stocks.index');
    }
}
