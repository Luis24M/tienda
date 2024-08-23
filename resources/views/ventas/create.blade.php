@extends('layouts.layout')

@section('content')
    <h2 class="text-3xl">Efectuar Venta</h2>
    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('ventas.efectuar') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="evidencia_pago">Subir Evidencia de Pago</label>
            <input type="file" name="evidencia_pago" required>
        </div>
        <button type="submit">Efectuar Venta</button>
    </form>
@endsection
