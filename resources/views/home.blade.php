@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Welcome to the Home Page</h1>
            </div>
        </div>
    </div>
    <section class="">
        <h2>Productos</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="https://via.placeholder.com/500" alt="Placeholder" class="w-full h-32 object-cover">
                <div class="p-4">
                    <h3 class="font-semibold text-lg">Product 1</h3>
                    <p class="text-gray-500">$19.99</p>
                    <button class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add to Cart</button>
                </div>
            </div>
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="https://via.placeholder.com/500" alt="Placeholder" class="w-full h-32 object-cover">
                <div class="p-4">
                    <h3 class="font-semibold text-lg">Product 2</h3>
                    <p class="text-gray-500">$19.99</p>
                    <button class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add to Cart</button>
                </div>
            </div>
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="https://via.placeholder.com/500" alt="Placeholder" class="w-full h-32 object-cover">
                <div class="p-4">
                    <h3 class="font-semibold text-lg">Product 3</h3>
                    <p class="text-gray-500">$19.99</p>
                    <button class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add to Cart</button>
                </div>
            </div>
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="https://via.placeholder.com/500" alt="Placeholder" class="w-full h-32 object-cover">
                <div class="p-4">
                    <h3 class="font-semibold text-lg">Product 4</h3>
                    <p class="text-gray-500">$19.99</p>
                    <
    </section>
@endsection