<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SampleController;
use App\Http\Controllers\Admin\Dashboard;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Guys custom routes for the admin panel are defined here.
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. ~ Wawaaaa!
*/

Route::get('/dashboard', [Dashboard::class, 'index'])->name('admin.dashboard');

Route::get('/get-dispatchers', [SampleController::class, 'index'])->name('admin.get-dispatchers');
Route::get('/create-dispatcher', [SampleController::class, 'create'])->name('admin.create-dispatchers');
Route::get('/edit-dispatcher/{id}', [SampleController::class, 'edit'])->name('admin.edit-dispatchers');
Route::post('/store-dispatcher', [SampleController::class, 'store'])->name('admin.store-dispatchers');
Route::put('/update-dispatcher/{id}', [SampleController::class, 'update'])->name('admin.update-dispatchers');
Route::delete('/delete-dispatcher/{id}', [SampleController::class, 'delete'])->name('admin.delete-dispatchers');


