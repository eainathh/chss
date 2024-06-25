<?php

use App\Http\Controllers\Admin\ClientesController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\ProjetosController;
use App\Http\Controllers\Admin\ColaboradoresController;
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



Auth::routes();
Route::name('admin.')->middleware('auth')->group(function () {
    Route::get('', [IndexController::class, 'index'])->name('index');

    Route::name('clientes.')->prefix('clientes')->controller(ClientesController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/new', 'new')->name('new');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::get('/delete/{id}', 'delete')->name('delete');
        Route::post('/store', 'store')->name('store');
        Route::post('/update/{id}', 'update')->name('update');
    });
    Route::name('projetos.')->prefix('projetos')->controller(ProjetosController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/new', 'new')->name('new');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::get('/delete/{id}', 'delete')->name('delete');
        Route::post('/store', 'store')->name('store');
        Route::post('/update/{id}', 'update')->name('update');
        Route::post('/levantamento/{id}', 'levantamento')->name('levantamento');
        Route::post('/equipe/{id}', 'equipe')->name('equipe');
    });
    Route::name('colaboradores.')->prefix('colaboradores')->controller(ColaboradoresController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/new', 'new')->name('new');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::get('/delete/{id}', 'delete')->name('delete');
        Route::post('/store', 'store')->name('store');
        Route::post('/update/{id}', 'update')->name('update');
        Route::post('/storeAssociacao/{id}', 'storeAssociacao')->name('storeAssociacao');
        Route::post('/upload-profile', ['as'=>'upload-profile','uses'=>'uploadProfile']);
    });

    Route::name('feedbacks.')->prefix('feedbacks')->controller(FeedbacksRespostasController::class)->group( function() {
        Route::get('/', 'index')->name('index');
    });
});

