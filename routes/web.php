<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\Detalle_FacturaController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group([
    // 'middleware' => 'auth',
    'prefix' => '/'
], function ($router) {
    Route::get('', function () {return view('welcome');});

    Route::resource('cliente', ClienteController::class);
    Route::get('pdf_cliente', [ClienteController::class, 'imprimir'])->name('pdf.cliente');
    Route::resource('proveedor', ProveedorController::class);
    Route::get('pdf_proveedor', [ProveedorController::class, 'imprimir'])->name('pdf.proveedor');
    Route::resource('factura', FacturaController::class);
    Route::resource('producto', ProductoController::class);
    Route::get('pdf_producto', [ProductoController::class, 'imprimir'])->name('pdf.producto');
    Route::resource('detalle_factura', Detalle_FacturaController::class);
});
