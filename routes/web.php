<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CMS\OverviewController;
use App\Http\Controllers\CMS\CategoryController;
use App\Http\Controllers\CMS\EventController;

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

Route::get('/CMS', [OverviewController::class, 'index'])->name('overview');

Route::get('/add_category', [CategoryController::class, 'index'])->name('view_add_category');
Route::post('/add_category', [CategoryController::class, 'addCategory'])->name('add_category');

Route::get('/add_event', [EventController::class, 'index'])->name('view_add_event');
Route::post('/add_event', [EventController::class, 'addEvent'])->name('add_event');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
