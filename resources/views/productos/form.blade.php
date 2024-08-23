<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    {{-- form para crear y editar --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl">Agregar producto</h2>
                    <form
                        action="{{ isset($producto) ? route('productos.update', $producto->id) : route('productos.store') }}"
                        method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @isset($producto)
                            @method('PUT')
                        @endisset
                        <div class="mb-4">
                            <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                            <input type="text" name="nombre" id="nombre" value="{{ $producto->nombre ?? '' }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        {{-- categoria de la tabla de categorias --}}
                        <div class="mb-4">
                            <label for="id_categoria"
                                class="block text-gray-700 text-sm font-bold mb-2">Categoria</label>
                            <select name="id_categoria"" id="id_categoria"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Seleccionar categoria</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}"
                                        {{ isset($producto) && $producto->id_categoria == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- Jerarquia de la tabla de jerarquias --}}
                        <div class="mb-4">
                            <label for="id_jerarquia"
                                class="block text-gray-700 text-sm font-bold mb-2">Jerarquia</label>
                            <select name="id_jerarquia" id="id_jerarquia"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Seleccionar jerarquia</option>
                                @foreach ($jerarquias as $jerarquia)
                                    <option value="{{ $jerarquia->id }}"
                                        {{ isset($producto) && $producto->id_jerarquia == $jerarquia->id ? 'selected' : '' }}>
                                        {{ $jerarquia->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- Talla de la tabla de tallas --}}
                        <div class="mb-4">
                            <label for="id_talla" class="block text-gray-700 text-sm font-bold mb-2">Talla</label>
                            <select name="id_talla" id="id_talla"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Seleccionar talla</option>
                                @foreach ($tallas as $talla)
                                    <option value="{{ $talla->id }}"
                                        {{ isset($producto) && $producto->id_talla == $talla->id ? 'selected' : '' }}>
                                        {{ $talla->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- color --}}
                        <div class="mb-4">
                            <label for="color" class="block text-gray-700 text-sm font-bold mb-2">Color</label>
                            <input type="text" name="color" id="color" value="{{ $producto->color ?? '' }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label for="imagen">Imagen del producto:</label>
                            <input type="file" name="imagen" id="imagen">
                        </div>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
