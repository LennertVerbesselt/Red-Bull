<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CMS\OverviewController;
use App\Http\Controllers\CMS\CategoryController;
use App\Http\Controllers\CMS\EventController;
use App\Http\Controllers\CMS\UserController;
use App\Http\Controllers\CMS\ChallengeController;
use App\Http\Controllers\CMS\QRController;

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


//CMS Routes
Route::get('/CMS', [OverviewController::class, 'index'])->name('overview');
Route::get('/CMS/users', [UserController::class, 'index'])->name('users');
Route::get('/CMS/categories', [categoryController::class, 'index'])->name('categories');
Route::get('/CMS/events', [EventController::class, 'index'])->name('events');
Route::get('/CMS/Challenges', [ChallengeController::class, 'index'])->name('challenges');
Route::get('/CMS/Posts', [QRController::class, 'index'])->name('posts');
Route::get('/CMS/QR', [QRController::class, 'index'])->name('qrcodes');

Route::get('/CMS/add_category', [CategoryController::class, 'addCategoryPage'])->name('view_add_category');
Route::post('/CMS/add_category', [CategoryController::class, 'addCategory'])->name('add_category');

Route::get('/CMS/add_event', [EventController::class, 'addEventPage'])->name('view_add_event');
Route::post('/CMS/add_event', [EventController::class, 'addEvent'])->name('add_event');

Route::get('/CMS/add_featured_events', [EventController::class, 'addFeaturedEventsPage'])->name('view_add_featured_events');
Route::post('/CMS/add_featured_events', [EventController::class, 'addFeaturedEvents'])->name('add_featured_events');

Route::get('/CMS/add_challenge_set', [ChallengeController::class, 'addChallengeSetPage'])->name('view_add_challenge_set');
Route::post('/CMS/add_challenge_set', [ChallengeController::class, 'addChallengeSet'])->name('add_challenge_set');

Route::get('/CMS/add_challenge', [ChallengeController::class, 'addChallengePage'])->name('view_add_challenge');
Route::post('/CMS/add_challenge', [ChallengeController::class, 'addChallenge'])->name('add_challenge');

Route::get('/CMS/add_qr_codes', [QRController::class, 'addQRCodesPage'])->name('view_add_qr_codes');
Route::post('/CMS/add_qr_codes', [QRController::class, 'addQRCodes'])->name('add_qr_codes');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
