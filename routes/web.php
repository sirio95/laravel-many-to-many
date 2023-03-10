<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [MainController::class, 'home'])
    ->name('home');

Route::get('/product/create', [MainController::class, 'create_new'])
    ->name('product.create_new');

Route::post('/product/create', [MainController::class, 'productStore'])
    ->name('product.store');

Route::get('/product/edit/{product}', [MainController::class, 'product_edit'])
    ->name('product.edit');
Route::post('/product/edit/{product}', [MainController::class, 'product_update'])
    ->name('product.update');

Route::get('/product/delete/{product}', [MainController::class, 'product_delete'])
    ->name('product.delete');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';