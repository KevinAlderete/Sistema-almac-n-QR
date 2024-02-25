<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/index', [indexController::class, 'index']);
});

Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');


    Route::resource('/permissions', PermissionController::class);

    Route::resource('/users', UserController::class);
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');
});

//Route::get('/empleados/{empleado}/carnetPDF', [EmpleadoController::class, 'carnet'])->name('empleados.carnet');
Route::get('/categorias/{categoria}/codePDF', [CategoriaController::class, 'codeQR'])->name('categorias.codeQR');

Route::get('/reporte/{venta}/boletaPDF', [ReporteController::class, 'boletaPDF'])->name('reporte.boletaPDF');


Route::middleware(['auth', 'role:admin|almacenero'])->name('categorias.')->prefix('categorias')->group(function () {

    Route::resource('/', CategoriaController::class);
    Route::get('/', [CategoriaController::class, 'index'])->name('index');
    Route::get('/{categoria}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');

    Route::put('/{categoria}', [CategoriaController::class, 'update'])->name('categorias.update');
    Route::delete('/{categoria}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
});

Route::middleware(['auth', 'role:admin|almacenero'])->name('proveedors.')->prefix('proveedors')->group(function () {

    Route::resource('/', ProveedorController::class);
    Route::get('/', [ProveedorController::class, 'index'])->name('index');
    Route::get('/{proveedor}/edit', [ProveedorController::class, 'edit'])->name('proveedors.edit');

    Route::put('/{proveedor}', [ProveedorController::class, 'update'])->name('proveedors.update');
    Route::delete('/{proveedor}', [ProveedorController::class, 'destroy'])->name('proveedors.destroy');
});

Route::post('/articulos/codeqr', [ArticuloController::class, 'codeqr'])->name('articulos.codeqr');



Route::post('/ventas/codeqr', [VentaController::class, 'codeqr'])->name('ventas.codeqr');

Route::get('/articulos/reporte', [ArticuloController::class, 'reporte'])->name('articulos.reporte');

Route::middleware(['auth', 'role:admin|almacenero'])->name('articulos.')->prefix('articulos')->group(function () {
    Route::resource('/', ArticuloController::class);
    Route::get('/', [ArticuloController::class, 'index'])->name('index');
    Route::get('/{articulo}/edit', [ArticuloController::class, 'edit'])->name('articulos.edit');

    Route::put('/{articulo}', [ArticuloController::class, 'update'])->name('articulos.update');
    Route::delete('/{articulo}', [ArticuloController::class, 'destroy'])->name('articulos.destroy');
});

Route::middleware(['auth', 'role:admin|vendedor'])->name('ventas.')->prefix('ventas')->group(function () {
    Route::resource('/', VentaController::class);
    Route::get('/', [VentaController::class, 'index'])->name('index');
    Route::get('/{venta}/edit', [VentaController::class, 'edit'])->name('ventas.edit');

    Route::put('/{venta}', [VentaController::class, 'update'])->name('ventas.update');
    Route::delete('/{venta}', [VentaController::class, 'destroy'])->name('ventas.destroy');
});

Route::middleware(['auth', 'role:admin|vendedor'])->name('ventas.')->prefix('ventas')->group(function () {
    Route::resource('/', VentaController::class);
    Route::get('/', [VentaController::class, 'index'])->name('index');
});



Route::middleware(['auth', 'role:admin'])->name('empleados.')->prefix('empleados')->group(function () {

    Route::resource('/', EmpleadoController::class);
    Route::get('/', [EmpleadoController::class, 'index'])->name('index');
    Route::get('/{empleado}', [EmpleadoController::class, 'show'])->name('empleados.show');
    Route::get('/{empleado}/edit', [EmpleadoController::class, 'edit'])->name('empleados.edit');

    Route::put('/{empleado}', [EmpleadoController::class, 'update'])->name('empleados.update');
    Route::delete('/{empleado}', [EmpleadoController::class, 'destroy'])->name('empleados.destroy');
});

Route::middleware(['auth', 'role:admin'])->name('asistencias.')->prefix('asistencias')->group(function () {
    Route::resource('/', AsistenciaController::class);
    Route::get('/', [AsistenciaController::class, 'index'])->name('index');
});


Route::get('/reporte/buscar', [ReporteController::class, 'buscar'])->name('reporte.buscar');

Route::middleware(['auth', 'role:admin|vendedor'])->name('reporte.')->prefix('reporte')->group(function () {
    Route::resource('/', ReporteController::class);
    Route::get('/', [ReporteController::class, 'index'])->name('index');


    Route::delete('/{asistencia}', [ReporteController::class, 'destroy'])->name('reporte.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
