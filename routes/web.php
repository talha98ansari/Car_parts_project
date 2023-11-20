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

    Route::resource('users', 'App\Http\Controllers\UserController');
    Route::post('/update/users/{id}', 'App\Http\Controllers\UserController@update')->name('users.up');
    Route::get('/users/delete/{id}', 'App\Http\Controllers\UserController@destroy')->name('users.remove');
    Route::get('/users/status/{id}', 'App\Http\Controllers\UserController@status')->name('users.status');


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

    Route::resource('vendors', 'App\Http\Controllers\VendorController');
    Route::post('/update/vendors/{id}', 'App\Http\Controllers\VendorController@update')->name('vendors.up');
    Route::get('/vendors/delete/{id}', 'App\Http\Controllers\VendorController@destroy')->name('vendors.remove');
    Route::get('/vendors/status/{id}', 'App\Http\Controllers\VendorController@status')->name('vendors.status');


    Route::resource('categories', 'App\Http\Controllers\CategoriesController');
    Route::post('/update/categories/{id}', 'App\Http\Controllers\CategoriesController@update')->name('categories.up');
    Route::get('/categories/delete/{id}', 'App\Http\Controllers\CategoriesController@destroy')->name('categories.remove');
    Route::get('/categories/status/{id}', 'App\Http\Controllers\CategoriesController@status')->name('categories.status');

    Route::resource('partType', 'App\Http\Controllers\partTypeController');
    Route::post('/update/partType/{id}', 'App\Http\Controllers\partTypeController@update')->name('partType.up');
    Route::get('/partType/delete/{id}', 'App\Http\Controllers\partTypeController@destroy')->name('partType.remove');
    Route::get('/partType/status/{id}', 'App\Http\Controllers\partTypeController@status')->name('partType.status');

    Route::resource('parts', 'App\Http\Controllers\PartsController');
    Route::post('/update/parts/{id}', 'App\Http\Controllers\partsController@update')->name('parts.up');
    Route::get('/parts/delete/{id}', 'App\Http\Controllers\partsController@destroy')->name('parts.remove');
    Route::get('/parts/status/{id}', 'App\Http\Controllers\partsController@status')->name('parts.status');
});

// Vendor Routes
Route::middleware(['check.role:2'])->group(function () {
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);

});


// Route for unauthorized access
Route::get('/unauthorized', function () {
    return 'Unauthorized access!';
})->name('unauthorized');
