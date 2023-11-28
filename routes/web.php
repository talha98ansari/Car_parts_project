<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRoleMiddleware;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\partTypeController;
use App\Http\Controllers\PartsController;
use App\Http\Controllers\SiteController;


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
Route::get('/', 'App\Http\Controllers\FrontController@index')->name('index');
Route::get('/about-us', 'App\Http\Controllers\FrontController@about_us')->name('about.us');
Route::get('/contact-us', 'App\Http\Controllers\FrontController@contact')->name('contact.us');
Route::get('/legal-terms', 'App\Http\Controllers\FrontController@legel_terms')->name('legal_terms');
Route::get('/terms-and-condition', 'App\Http\Controllers\FrontController@terms_condition')->name('terms_condition');
Route::get('/privacy-policy', 'App\Http\Controllers\FrontController@privacy_policy')->name('privacy_policy');
Route::get('/view/part/{id}', 'App\Http\Controllers\FrontController@partview')->name('parts');
Route::get('/view/category/{id}', 'App\Http\Controllers\FrontController@catrgoryview')->name('category.index');
Route::get('/view/detail/{id}', 'App\Http\Controllers\FrontController@partdetail')->name('part.detail');

Route::get('/user/login', 'App\Http\Controllers\UserRegistrationController@loginPage')->name('user.login');
Route::get('/user/registration', 'App\Http\Controllers\UserRegistrationController@registerationPage')->name('user.registration');
Route::post('/user/registration/save', 'App\Http\Controllers\UserRegistrationController@saveUser')->name('user.registration.save');

Route::post('/user/login/check', 'App\Http\Controllers\FrontLoginController@login')->name('user.login.check');



Route::get('/vendor/login', 'App\Http\Controllers\vendorRegistrationController@loginPage')->name('vendor.login');
Route::get('/vendor/registration', 'App\Http\Controllers\vendorRegistrationController@registerationPage')->name('vendor.registration');
Route::post('/vendor/registration/save', 'App\Http\Controllers\vendorRegistrationController@savevendor')->name('vendor.registration.save');



Auth::routes();
Route::post('/password', 'App\Http\Controllers\Auth\ResetPasswordController@password')->name('password.save');
Route::get('change/password', 'App\Http\Controllers\Auth\ResetPasswordController@passwordView')->name('password.change');

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

    Route::get('/site-setting/about-us', 'App\Http\Controllers\SiteController@aboutUs')->name('site.about');
    Route::post('/site-setting/about-us/{id}', 'App\Http\Controllers\SiteController@storeAboutUs')->name('store.site.about');

    Route::get('/site-setting/contact-us', 'App\Http\Controllers\SiteController@contactUs')->name('site.contact');
    Route::post('/site-setting/contact-us/{id}', 'App\Http\Controllers\SiteController@storecontactUs')->name('store.site.contact');
    Route::post('/update/contact/{id}', 'App\Http\Controllers\SiteController@update')->name('contact.up');
    Route::get('/update/contact/{id}', 'App\Http\Controllers\SiteController@edit')->name('contact.edit');
    Route::get('/contact/delete/{id}', 'App\Http\Controllers\SiteController@destroy')->name('contact.remove');
    Route::get('/contact/add', 'App\Http\Controllers\SiteController@create')->name('contact.create');
    Route::post('/contact/address/store', 'App\Http\Controllers\SiteController@store')->name('contact_us.store');

    Route::get('/site-setting/others', 'App\Http\Controllers\SiteController@othersIndex')->name('site.other.index');
    Route::get('/site-setting/others/create-page', 'App\Http\Controllers\SiteController@othersCreate')->name('site.other.create');
    Route::post('/site-setting/others/store', 'App\Http\Controllers\SiteController@Otherstore')->name('site.other.store');
    Route::get('/site-setting/others/update{data}', 'App\Http\Controllers\SiteController@Otheredit')->name('site.other.edit');
    Route::post('/site-setting/others/update{id}', 'App\Http\Controllers\SiteController@Otherupdate')->name('site.other.up');
    Route::get('site-setting/others/delete/{id}', 'App\Http\Controllers\SiteController@Otherdestroy')->name('site.other.remove');

    Route::resource('follow', 'App\Http\Controllers\followController');
    Route::post('/update/follow/{id}', 'App\Http\Controllers\followController@update')->name('follow.up');
    Route::get('/follow/delete/{id}', 'App\Http\Controllers\followController@destroy')->name('follow.remove');
    Route::get('/follow/status/{id}', 'App\Http\Controllers\followController@status')->name('follow.status');
});

// Vendor Routes
Route::middleware(['check.role:2'])->group(function () {
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);

});


// Route for unauthorized access
Route::get('/unauthorized', function () {
    return 'Unauthorized access!';
})->name('unauthorized');
