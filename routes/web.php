<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SampleController;

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

Route::get('/', [SampleController::class, 'index'])->name('admin.get-dispatchers');
Route::get('/create-dispatcher', [SampleController::class, 'create'])->name('admin.create-dispatchers');
Route::get('/edit-dispatcher/{id}', [SampleController::class, 'edit'])->name('admin.edit-dispatchers');
Route::post('/store-dispatcher', [SampleController::class, 'store'])->name('admin.store-dispatchers');
Route::put('/update-dispatcher/{id}', [SampleController::class, 'update'])->name('admin.update-dispatchers');
Route::delete('/delete-dispatcher/{id}', [SampleController::class, 'delete'])->name('admin.delete-dispatchers');