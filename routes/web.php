<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRoleMiddleware;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\partTypeController;
use App\Http\Controllers\PartsController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [FrontController::class, 'index']);



Auth::routes();

// Admin routes
Route::middleware(['auth', 'check.role:1'])->prefix('admin')->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\HomeController@index')->name('home');

    Route::resource('users', 'App\Http\Controllers\UserController', ['except' => ['show']]);

    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);

    Route::get('upgrade', function () {
        return view('pages.upgrade');
    })->name('upgrade');

    Route::get('map', function () {
        return view('pages.maps');
    })->name('map');

    Route::get('icons', function () {
        return view('pages.icons');
    })->name('icons');

    Route::get('table-list', function () {
        return view('pages.tables');
    })->name('table');

    Route::put('profile/password', [
        'as' => 'profile.password',
        'uses' => 'App\Http\Controllers\ProfileController@password'
    ]);

    Route::resource('vendors', VendorController::class);
    Route::resource('categories', CatgoriesController::class);
    Route::resource('partType', partTypeController::class);
    Route::resource('parts', PartsController::class);

});

// Vendor Routes
Route::middleware(['check.role:2'])->group(function () {
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);

});


// Route for unauthorized access
Route::get('/unauthorized', function () {
    return 'Unauthorized access!';
})->name('unauthorized');
