<?php

use App\Http\Controllers\PresentationController;
use App\Http\Controllers\ProductController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

/* Route::get('/presentation', [App\Http\Controllers\PresentationController::class, 'index'])->name('presentation.index');
Route::get('/presentation/create', [App\Http\Controllers\PresentationController::class, 'create'])->name('presentation.create');
Route::post('/presentation', [App\Http\Controllers\PresentationController::class, 'store'])->name('presentation.store');
Route::get('/presentation/{id}/edit', [App\Http\Controllers\PresentationController::class, 'edit'])->name('presentation.edit');
Route::put('/presentation/{id}', [App\Http\Controllers\PresentationController::class, 'update'])->name('presentation.update');
Route::delete('/presentation/{id}', [App\Http\Controllers\PresentationController::class, 'destroy'])->name('presentation.destroy'); */

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::resource('/presentations', PresentationController::class);
    Route::resource('/products', ProductController::class);
});
