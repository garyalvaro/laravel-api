<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BelajarController;


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
    // return view('welcome');
    return redirect()->route('read');
});

Route::get('/read', [BelajarController::class,'read'])->name('read');

Route::get('/create', [BelajarController::class,'create'])->name('create');
Route::post('/store', [BelajarController::class,'store'])->name('store');

Route::get('/edit/{id}', [BelajarController::class,'edit'])->name('edit');
Route::post('/update/{id}', [BelajarController::class,'update'])->name('update');

Route::get('/delete/{id}', [BelajarController::class,'destroy'])->name('delete');

// Route::resource('/', BelajarController::class);
