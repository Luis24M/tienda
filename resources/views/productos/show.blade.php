@extends('layouts.layout')

@section('content')
    <div class="flex justify-between items-center mb-5 ">
        <h2 class="text-6xl font-bold">{{ $producto->nombre }}</h2>
    </div>
    <div class="flex justify-center text-xl items-center mx-10 gap-10">
        <img src="{{ asset('images/productos/' . $producto->imagen) }}" alt="{{ $producto->nombre }}"
            class="w-1/2 h-[500px] object-cover">
        <div class="flex flex-col gap-2 w-1/4 justify-between">
            <p>
                <strong>
                    Categoria:
                </strong>
                {{ $producto->categoria->nombre }}
            </p>
            <p>
                <strong>
                    Jerarquia:
                </strong>
                {{ $producto->jerarquia->nombre }}
            </p>
            {{-- talla en dropdown --}}
            <p>
                <strong>
                    Talla:
                </strong>
                <select name="talla" id="talla" class="border">
                    @foreach ($tallas as $talla)
                        <option value="{{ $talla->id }}" {{ $producto->id_talla == $talla->id ? 'selected' : '' }}>
                            {{ $talla->nombre }}
                        </option>
                    @endforeach
                </select>
            </p>
            <p>
                <strong>
                    Color:
                </strong>
                {{ $producto->color }}
            </p>
            <p>
                <strong>
                    Precio:
                </strong>
                {{ $producto->precio }}
            </p>
            <form action="{{ route('carrito.agregar') }}" method="POST">
                @csrf
                <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Agregar al Carrito</button>
            </form>
        </div>
    </div>
@endsection
