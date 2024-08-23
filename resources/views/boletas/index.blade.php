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
                  <div class="flex justify-between">
                      <h2 class="text-2xl">Administrar Boletas</h2>
                      
                  </div>
                  <table class="table-auto w-full border my-5">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Fecha</th>
                            <th class="px-4 py-2">Total</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($boletas as $boleta)
                            <tr>
                                <td class="border px-4 py-2">{{ $boleta->id }}</td>
                                <td class="border px-4 py-2">{{ $boleta->created_at }}</td>
                                <td class="border px-4 py-2">{{ $boleta->total }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('boletas.show', $boleta->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ver</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
  </x-app-layout>
  