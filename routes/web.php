<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupermarketController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::resource('products', 'App\Http\Controllers\SupermarketController');
Route::get('product/soft/delete/{id}', 'App\Http\Controllers\SupermarketController@softDelete')
->name('soft.delete');
Route::get('product/trash', 'App\Http\Controllers\SupermarketController@trashedProducts')
->name('product.trash');
Route::get('product/back/from/trash{id}', 'App\Http\Controllers\SupermarketController@backFromTrash')
->name('product.back.from.trash');
Route::get('product/delete/from/database{id}', 'App\Http\Controllers\SupermarketController@deleteForever')
->name('product.delete.from.database');