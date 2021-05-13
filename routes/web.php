<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CMS\OverviewController;
use App\Http\Controllers\CMS\CategoryController;
use App\Http\Controllers\CMS\EventController;
use App\Http\Controllers\CMS\UserController;
use App\Http\Controllers\CMS\ChallengeController;

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
Route::get('/CMS/users', [UserController::class, 'index'])->name('users');
Route::get('/CMS/categories', [categoryController::class, 'index'])->name('categories');
Route::get('/CMS/events', [EventController::class, 'index'])->name('events');
Route::get('/CMS/Challenges', [ChallengeController::class, 'index'])->name('challenges');
Route::get('/CMS/Posts', [PostController::class, 'index'])->name('posts');

Route::get('/add_category', [CategoryController::class, 'addCategoryPage'])->name('view_add_category');
Route::post('/add_category', [CategoryController::class, 'addCategory'])->name('add_category');

Route::get('/add_event', [EventController::class, 'addEventPage'])->name('view_add_event');
Route::post('/add_event', [EventController::class, 'addEvent'])->name('add_event');

Route::get('/add_featured_events', [EventController::class, 'addFeaturedEventsPage'])->name('view_add_featured_events');
Route::post('/add_featured_events', [EventController::class, 'addFeaturedEvents'])->name('add_featured_events');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
