<?php

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index'])->middleware(['auth'])->name('projects');
Route::get('/project/nouveau', [App\Http\Controllers\ProjectController::class, 'create'])->middleware(['auth'])->name('create_project');
Route::get('/{id}/profil', [App\Http\Controllers\UserController::class, 'show'])->middleware(['auth'])->name('profil');
