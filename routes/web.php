<?php

use App\Http\Controllers\CartController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('products');
});


// Route::post('/add-to-cart', 'CartController@addToCart')->name('cart.add');
// Route::post('/add-to-cart',[CartController::class,'addToCart'])->name('addToCart');

// Route::get('/reload-div', 'YourController@reloadDiv')->name('reload.div');
// Route::get('/reload-div',[CartController::class,'reloadDiv'])->name('reload.div');

// Cart Routes
Route::post('/cart/product/add/{id}', [CartController::class, 'addCart']);