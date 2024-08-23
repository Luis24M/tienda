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
                    <h2 class="text-2xl">Agregar stock</h2>
                    <form action="{{ isset($stock) ? route('stocks.update', $stock->id) : route('stocks.store') }}" method="POST">
                        @csrf
                        @isset($stock)
                            @method('PUT')
                        @endisset
                        <div class="mb-4">
                            <label for="id_producto" class="block text-gray-700 text-sm font-bold mb-2">Producto</label>
                            <select name="id_producto" id="id_producto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" onchange="updateTalla()">
                                <option value="">Seleccione el producto</option>
                                @foreach ($productos as $producto)
                                    <option value="{{ $producto->id }}" data-talla="{{ $producto->id_talla }}" {{ old('id_producto', $stock->id_producto ?? '') == $producto->id ? 'selected' : '' }}>{{ $producto->nombre }} - {{ $producto->talla->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="id_talla" id="id_talla" value="{{ old('id_talla', $stock->id_talla ?? '') }}">
                        <div class="mb-4">
                            <label for="cantidad" class="block text-gray-700 text-sm font-bold mb-2">Cantidad</label>
                            <input type="number" name="cantidad" id="cantidad" value="{{ old('cantidad', $stock->cantidad ?? '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="umbral_minimo" class="block text-gray-700 text-sm font-bold mb-2">Umbral mínimo</label>
                            <input type="number" name="umbral_minimo" id="umbral_minimo" value="{{ old('umbral_minimo', $stock->umbral_minimo ?? '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function updateTalla() {
            const productoSelect = document.getElementById('id_producto');
            const tallaInput = document.getElementById('id_talla');
            const selectedOption = productoSelect.options[productoSelect.selectedIndex];
            const tallaId = selectedOption.getAttribute('data-talla');
            tallaInput.value = tallaId;
        }
    </script>
</x-app-layout>
