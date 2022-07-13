<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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


Route::get('admin', AdminController::class)->name('admin');

Route::get('admin/users', [UserController::class, 'index'])->name('admin.users.index');

Route::get('admin/users/create', [UserController::class, 'create'])->name('admin.users.create');

Route::post('admin/users', [UserController::class, 'store'])->name('admin.users.store');

Route::get('admin/users/{id}', [UserController::class, 'show'])->name('admin.users.show');

Route::get('admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');

Route::patch('admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');

Route::delete('admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
