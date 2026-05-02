<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::get('/', [ContactController::class, 'index'])->name('home');

Route::prefix('contacts')
    ->name('contacts.')
    ->controller(ContactController::class)
    ->group(function () {
        Route::get('/create', 'storeView')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/edit', 'updateView')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'delete')->name('destroy');
    });
