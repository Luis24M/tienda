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
                  <h2 class="text-2xl">Agregar talla</h2>
                  <form action="{{ isset($talla) ? route('tallas.update', $talla->id) : route('tallas.store') }}" method="POST">
                      @csrf
                      @isset($talla)
                          @method('PUT')
                      @endisset
                      <div class="mb-4">
                          <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                          <input type="text" name="nombre" id="nombre" value="{{ $talla->nombre ?? '' }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                      </div>
                      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
                  </form>
              </div>
          </div>
      </div>
</x-app-layout>
