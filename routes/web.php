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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', [App\Http\Controllers\ProjectController::class, 'welcome'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';

//Pages liées aux projects
Route::get('/choose/projets', [App\Http\Controllers\ProjectController::class, 'choose'])->middleware(['auth','verified'])->name('projects.choose');
Route::get('/projets', [App\Http\Controllers\ProjectController::class, 'index'])->middleware(['auth','verified'])->name('projects.index');
Route::get('/{id}/projets', [App\Http\Controllers\ProjectController::class, 'mine'])->middleware(['auth','verified'])->name('projects.mine');
Route::get('/offres', [App\Http\Controllers\ProjectController::class, 'maked'])->middleware(['auth','verified'])->name('projects.maked.mine');
Route::get('/{id}/projet', [App\Http\Controllers\ProjectController::class, 'show'])->middleware(['auth','verified'])->name('project.show');
Route::get('/{id}/suppression', [App\Http\Controllers\ProjectController::class, 'destroy'])->middleware(['auth','verified'])->name('project.destroy');
Route::post('/{id}/projets', [App\Http\Controllers\ProjectController::class, 'store'])->middleware(['auth','verified'])->name('project.store');
Route::get('/projet/nouveau', [App\Http\Controllers\ProjectController::class, 'create'])->middleware(['auth','verified'])->name('project.create');
//Profil du User
Route::get('/{id}/profil', [App\Http\Controllers\UserController::class, 'show'])->middleware(['auth','verified'])->name('profil.show');
//Contact
Route::post('/', [App\Http\Controllers\ContactController::class, 'contact'])->name('contact');
//Favoris
Route::get('/{id}/favoris', [App\Http\Controllers\FavoriteController::class, 'index'])->middleware(['auth','verified'])->name('favoris.index');
Route::post('/{id}/favoris', [App\Http\Controllers\FavoriteController::class, 'store'])->middleware(['auth','verified'])->name('favoris.store');
//Offre
Route::post('/{id}/accept', [App\Http\Controllers\ProjectUserController::class, 'accept'])->middleware(['auth','verified'])->name('project.accept');
Route::post('/{id}/offre', [App\Http\Controllers\ProjectUserController::class, 'offer'])->middleware(['auth','verified'])->name('project.offer');
//Prestataires
Route::get('/prestataires', [App\Http\Controllers\UserController::class, 'makers'])->middleware(['auth','verified'])->name('makers.index');
