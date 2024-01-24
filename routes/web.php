<?php

use App\Http\Controllers\presentation_C;
use App\Http\Controllers\Produit_c;
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
Route::get('/', [Produit_c::class, 'index'])->name('produits.index');
Route::get('/produits', [Produit_c::class, 'index'])->name('produits.index');
Route::get('/produits/create', [Produit_c::class, 'create'])->name('produits.create');
Route::post('/produits', [Produit_c::class, 'store'])->name('produits.store');
Route::get('/produits/{produit}', [Produit_c::class, 'show'])->name('produits.show');
Route::get('/produits/{produit}/edit', [Produit_c::class, 'edit'])->name('produits.edit');
Route::post('/produits/{produit}', [Produit_c::class, 'update'])->name('produits.update');
Route::delete('/produits/{produit}', [Produit_c::class, 'destroy'])->name('produits.destroy');

// Route::controller(Produit_c::class)->group(function() {
// } );



