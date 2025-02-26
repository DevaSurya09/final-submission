<?php

use App\Http\Controllers\LibraryController;
use Illuminate\Support\Facades\Route;
use Termwind\Components\Li;

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

Route::get('/', action: function () {
    return view('welcome');
});

Route::get('/library', [LibraryController::class, 'index'])->name('post.view');
Route::get('/library/create', [LibraryController::class, 'create'])->name('post.create');
Route::post('/post/store', [LibraryController::class, 'store'])->name('post.store');
Route::get('/library/{id}/edit', [LibraryController::class, 'edit'])->name('post.edit');
Route::put('/library/{id}/update', [LibraryController::class, 'update'])->name('post.update');
Route::delete('/library/{id}/delete', [LibraryController::class, 'destroy'])->name('post.destroy');

