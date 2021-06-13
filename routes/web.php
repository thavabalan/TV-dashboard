<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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
    return view('dashboard');
})->middleware(['auth']);
Route::get('/dashboard',[PageController::class, 'views'])->name('dashboard');
Route::get('/live',[PageController::class, 'live'])->middleware(['auth'])->name('live');
Route::get('/view',[PageController::class, 'viewdash'])->middleware(['auth'])->name('views');
Route::post('/view',[PageController::class, 'viewfilter'])->middleware(['auth'])->name('viewfilter');
Route::get('/livemain', [PageController::class, 'livemain']);
Route::get('/live/{id}', [PageController::class, 'livesingle']);
require __DIR__.'/auth.php';
