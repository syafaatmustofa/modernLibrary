<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::view('dashboard', 'page.dashboard');
Route::get('dashboard',[BukuController::class, 'dashboard']); 
// Route::get('dashboard',[KategoriController::class, 'dashboard2']); 

Route::middleware(['auth', 'admin'])->group(function () {
    // kategori
    Route::resource('kategori', KategoriController::class);
    Route::get('deletekategori/{id}', [KategoriController::class, 'destroy'])->name('deletekategori');
});

Route::middleware(['auth', 'editor'])->group(function () {

    // buku
    Route::resource('buku', BukuController::class);
    Route::get('deletebuku/{id}', [BukuController::class, 'destroy'])->name('deletebuku');

    //user
    Route::resource('datauser', userController::class);
    Route::get('deleteuser/{id}', [userController::class, 'destroy'])->name('deleteuser');
});
