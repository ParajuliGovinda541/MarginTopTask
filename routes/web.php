<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth','admin'])->group(function () {
Route:: get('dashboard',[DashboardController::class, 'index'])->name('dashboard');
Route:: get('admin',[UserController::class, 'index'])->name('admin.index');
Route:: get('admin/create',[UserController::class, 'create'])->name('admin.create');
Route::post('admin', [UserController::class, 'store'])->name('admin.store');
Route::get('admin/edit/{id}', [UserController::class, 'edit'])->name('admin.edit');
Route::get('admin/show/{id}', [UserController::class, 'show'])->name('admin.viewuser');
Route::POST('admin/update/{id}', [UserController::class, 'update'])->name('admin.update');
Route::delete('admin/delete/{id}', [UserController::class, 'destroy'])->name('admin.delete');


});

Route:: get('user',[FrontController::class, 'index'])->name('user.index');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
