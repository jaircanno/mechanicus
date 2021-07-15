<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Redirect;
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
    return Redirect::route('login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::group(['middleware' => config('jetstream.middleware', ['web'])], function () {

    Route::group(['middleware' => ['auth', 'verified']], function () {
        // ---- User's Routes ---------------------------------------------------------------------
        Route::get('/user/profile', [UserController::class, 'show'])->name('profile.show');
    });
});
