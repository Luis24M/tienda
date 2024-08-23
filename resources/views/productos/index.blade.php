@extends('layouts.layout')

@section('content')
    <h2 class="text-3xl font-bold">Productos</h2>
    {{-- Sección de filtros --}}
    <section class="my-4 border rounded-md shadow-inner p-2">
        <form action="{{ route('productos.index') }}" method="GET" class="flex justify-between items-center">
            <div>
                <label for="categoria">Categoría</label>
                <select name="categoria" id="categoria">
                    <option value="0">Todas</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ request('categoria') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="talla">Talla</label>
                <select name="talla" id="talla">
                    <option value="0">Todas</option>
                    @foreach ($tallas as $talla)
                        <option value="{{ $talla->id }}" {{ request('talla') == $talla->id ? 'selected' : '' }}>
                            {{ $talla->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="jerarquia">Jerarquía</label>
                <select name="jerarquia" id="jerarquia">
                    <option value="0">Todas</option>
                    @foreach ($jerarquias as $jerarquia)
                        <option value="{{ $jerarquia->id }}" {{ request('jerarquia') == $jerarquia->id ? 'selected' : '' }}>
                            {{ $jerarquia->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="orden">Ordenar por</label>
                <select name="orden" id="orden">
                    <option value="0" {{ request('orden') == 0 ? 'selected' : '' }}>Precio</option>
                    <option value="1" {{ request('orden') == 1 ? 'selected' : '' }}>Nombre</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded ml-4">Filtrar</button>
        </form>
    </section>

    {{-- Sección de productos --}}
    <section class="flex gap-4">
        @foreach ($productos as $producto)
            <a href="{{ route('productos.show', $producto) }}" class="border border-stone-700 rounded-2xl w-1/4 hover:scale-105 duration-300">
                <img src="{{ asset('images/productos/' . $producto->imagen) }}" alt="{{ $producto->nombre }}"
                class="w-full h-[300px] object-cover">
                <div class="p-3 gap-2 flex flex-col">
                    <h3 class="text-xl font-bold">{{ $producto->nombre }}</h3>
                    <div class="flex gap-2 [&>p]:text-gray-600">
                        <p class="bg-slate-200 px-2 rounded-xl">{{ $producto->categoria->nombre ?? 'Sin categoría' }}</p>
                        <p class="bg-slate-200 px-2 rounded-xl">{{ $producto->jerarquia->nombre ?? 'Sin jerarquía' }}</p>
                    </div>
                    <p>Talla: {{ $producto->talla->nombre ?? 'Sin talla' }}</p>
                    <p>Color: {{ $producto->color }}</p>
                    <p>${{ $producto->precio }}</p>
                    
                    {{-- Agregar al carrito --}}
                    <form action="{{ route('carrito.agregar') }}" method="POST">
                        @csrf
                        <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Agregar al Carrito</button>
                    </form>
                </div>
            </a>
        @endforeach
    </section>    
@endsection
