<?php

use App\Http\Controllers\BancaController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
//

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/users.index', [UsersController::class, 'index'])
        ->name('users.index');
});

Route::controller(BancaController::class)->group(function () {
    Route::get('banca', 'index');
    Route::get('banca-export', 'export')->name('banca.export');
    Route::post('banca-import', 'import')->name('banca.import');
    Route::get('banca-archivado', 'archivado')->name('banca.archivado');
    Route::get('banca-relacion_mov', 'relacion_mov')->name('banca.relacion_mov');
});
Route::controller(ClienteController::class)->group(function () {
    Route::get('cliente', 'index');
    Route::post('cliente-import', 'import')->name('cliente.import');
});
