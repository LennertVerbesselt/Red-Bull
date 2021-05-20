<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisteredUserController;
use App\Http\Controllers\API\AuthenticatedSessionController;
use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ChallengeController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');

Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest')
                ->name('register');

//Route::post('register', [RegisteredUserController::class, 'store'])->name('register');

Route::get('/getsessiondata', [AuthenticatedSessionController::class, 'retrieveSessionData'])->name('getsessiondata');

Route::get('/getprofilepicture', [AuthenticatedSessionController::class, 'retrieveProfilePicture'])->name('getprofilepicture');

Route::get('/getfeaturedevents', [EventController::class, 'getFeaturedEvents'])->name('getfeaturedevents');

Route::get('/getcategories', [CategoryController::class, 'getCategories'])->name('getcategories');

Route::get('/getchallengesets', [ChallengeController::class, 'getChallengeSets'])->name('getchallengesets');

Route::post('/getchallenges', [ChallengeController::class, 'getChallenges'])->name('getchallenges');

Route::post('/getchallenge', [ChallengeController::class, 'getChallenge'])->name('getchallenge');

Route::post('/getchallengebadge', [ChallengeController::class, 'getChallengeBadge'])->name('getchallengebadge');

Route::post('/getchallengeprogression', [ChallengeController::class, 'getChallengeProgression'])->name('getchallengeprogression');