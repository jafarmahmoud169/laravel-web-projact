<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\prouctsController;

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
Route::get('/', function () {return redirect()->route('products.index');});
Route::get('/home', function () {return redirect()->route('products.index');});
Route::get('products/softdelete/{id}', [prouctsController::class,'softdelete'])->name('soft.delete');
Route::get('products/hadrdelete/{id}', [prouctsController::class,'harddelete'])->name('hard.delete');
Route::get('products/back/{id}', [prouctsController::class,'back'])->name('soft.back');
Route::get('/products/trash',prouctsController::class . '@trash')->name('products.trash');
Route::resource('products', prouctsController::class);




/////////////////////////////////////////////////////////////////////////////////////////////



// Route::get('/', prouctsController::class .'@index')->name('products.index');
// Route::get('/products/create', [prouctsController::class , 'create'])->name('products.create');
// Route::post('/products', prouctsController::class .'@store')->name('products.store');
// Route::get('/products/{product}', prouctsController::class .'@show')->name('products.show');
// Route::get('/products/{product}/edit', prouctsController::class .'@edit')->name('products.edit');
// Route::put('/products/{product}', prouctsController::class .'@update')->name('products.update');
// Route::delete('/products/{product}', prouctsController::class .'@destroy')->name('products.destroy');
