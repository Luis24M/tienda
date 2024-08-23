<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>
  {{-- Crud --}}
  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center">
                  <h2 class="text-2xl">Stocks</h2>
                  <a href="{{ route('stocks.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Agregar stock</a>
                </div>
                  <table class="table-auto w-full">
                      <thead>
                          <tr>
                              <th class="px-4 py-2">Producto</th>
                              <th class="px-4 py-2">Talla</th>
                              <th class="px-4 py-2">Cantidad</th>
                              <th class="px-4 py-2">Umbral mínimo</th>
                              <th class="px-4 py-2">Acciones</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($stocks as $stock)
                              <tr>
                                  <td class="border px-4 py-2">{{ $stock->producto->nombre }}</td>
                                  <td class="border px-4 py-2">{{ $stock->talla->nombre }}</td>
                                  <td class="border px-4 py-2">{{ $stock->cantidad }}</td>
                                  <td class="border px-4 py-2">{{ $stock->umbral_minimo }}</td>
                                  <td class="border px-4 py-2">
                                      <a href="{{ route('stocks.edit', $stock) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</a>
                                      <form action="{{ route('stocks.destroy', $stock) }}" method="POST" class="inline">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                                      </form>
                                  </td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  
</x-app-layout>
