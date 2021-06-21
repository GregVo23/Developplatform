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

//Pages liées aux projects
Route::get('/projets', [App\Http\Controllers\ProjectController::class, 'index'])->middleware(['auth'])->name('projects');
Route::get('/{id}/projets', [App\Http\Controllers\ProjectController::class, 'myProjects'])->middleware(['auth'])->name('my_projects');
Route::post('/{id}/projets', [App\Http\Controllers\ProjectController::class, 'store'])->middleware(['auth'])->name('store_project');
Route::get('/projet/nouveau', [App\Http\Controllers\ProjectController::class, 'create'])->middleware(['auth'])->name('create_project');
//Profil du User
Route::get('/{id}/profil', [App\Http\Controllers\UserController::class, 'show'])->middleware(['auth'])->name('profil');
