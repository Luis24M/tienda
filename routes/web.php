<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\JerarquiaController;
use App\Http\Controllers\TallaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\BoletaController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;
    
Route::get('/', function () {
    return view('auth.login');
})->name('home');

Route::resource('vendedores', VendedorController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('jerarquias', JerarquiaController::class);
Route::resource('tallas', TallaController::class);
Route::resource('ventas', VentaController::class);

Route::get('/ventas/boleta', [VentaController::class, 'boleta'])->name('ventas.boleta');
Route::get('/boletas/pdf/{boleta}', [VentaController::class, 'descargarBoleta'])->name('boletas.pdf');
Route::post('/ventas/efectuar', [VentaController::class, 'efectuarVenta'])->name('ventas.efectuar');
Route::resource('boletas', BoletaController::class);

Route::resource('stocks', StockController::class);


Route::get('/carrito', [CarritoController::class, 'mostrar'])->name('carrito.mostrar');
Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::post('/carrito/quitar/{id}', [CarritoController::class, 'quitar'])->name('carrito.quitar');
// Ruta personalizada para admin
// Proteger todas las rutas excepto index y update
Route::get('productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('productos/admin', [ProductoController::class, 'admin'])->middleware(['auth', 'verified'])->name('productos.admin');
Route::get('productos/create', [ProductoController::class, 'create'])->middleware(['auth', 'verified'])->name('productos.create');
Route::get('productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');
Route::get('productos/{producto}/edit', [ProductoController::class, 'edit'])->middleware(['auth', 'verified'])->name('productos.edit');
Route::post('productos', [ProductoController::class, 'store'])->middleware(['auth', 'verified'])->name('productos.store');
Route::put('productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
Route::patch('productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('productos/{producto}', [ProductoController::class, 'destroy'])->middleware(['auth', 'verified'])->name('productos.destroy');





// Ruta protegida para dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grupo de rutas protegidas para el perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Autenticación
require __DIR__.'/auth.php';


use App\Http\Middleware\RoleMiddleware;



