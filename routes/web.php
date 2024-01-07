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
Route::get('/', 'App\Http\Controllers\FrontController@index')->name('index.f');
Route::get('/about-us', 'App\Http\Controllers\FrontController@about_us')->name('about.us');
Route::get('/contact-us', 'App\Http\Controllers\FrontController@contact')->name('contact.us');
Route::get('/legal-terms', 'App\Http\Controllers\FrontController@legel_terms')->name('legal_terms');
Route::get('/terms-and-condition', 'App\Http\Controllers\FrontController@terms_condition')->name('terms_condition');
Route::get('/privacy-policy', 'App\Http\Controllers\FrontController@privacy_policy')->name('privacy_policy');
Route::get('/view/part/{id?}', 'App\Http\Controllers\FrontController@partview')->name('parts');
Route::get('/view/category/{id?}', 'App\Http\Controllers\FrontController@catrgoryview')->name('category.index');
Route::get('/view/detail/{id}', 'App\Http\Controllers\FrontController@partdetail')->name('part.detail');
Route::get('/service/detail/{id}', 'App\Http\Controllers\FrontController@serviceDetail')->name('service.detail');
Route::get('/favourites', 'App\Http\Controllers\FrontController@favourites')->name('favourites');

Route::post('/save-contact-info', 'App\Http\Controllers\FrontController@saveContactForm')->name('contact_info.save');

Route::get('/user/login', 'App\Http\Controllers\UserRegistrationController@loginPage')->name('user.login');
Route::get('/user/registration', 'App\Http\Controllers\UserRegistrationController@registerationPage')->name('user.registration');
Route::post('/user/registration/save', 'App\Http\Controllers\UserRegistrationController@saveUser')->name('user.registration.save');

Route::post('/user/login/check', 'App\Http\Controllers\FrontLoginController@login')->name('user.login.check');
Route::post('/vendor/login', 'App\Http\Controllers\FrontLoginController@Vendorlogin')->name('vendor.login.check');

Route::get('/vendor/login', 'App\Http\Controllers\vendorRegistrationController@loginPage')->name('vendor.login');

Route::get('/vendor/registration/type', 'App\Http\Controllers\vendorRegistrationController@registerationPageType')->name('vendor.registration.type');
Route::get('/vendor/registration', 'App\Http\Controllers\vendorRegistrationController@registerationPage')->name('vendor.registration');
Route::get('/vendor/registration/business', 'App\Http\Controllers\vendorRegistrationController@BusinessregisterationPage')->name('vendor.registration.business');
Route::post('/vendor/registration/save', 'App\Http\Controllers\vendorRegistrationController@savevendor')->name('vendor.registration.save');
Route::post('/vendor/registration/save/nb', 'App\Http\Controllers\vendorRegistrationController@savevendorNB')->name('vendor.registration.nb');

Route::get('/vendor/registration/type', 'App\Http\Controllers\vendorRegistrationController@registerationPageType')->name('vendor.registration.type');
Route::get('/reset/password', 'App\Http\Controllers\FrontLoginController@forgotPass')->name('reset.check');
Route::post('/verify/email', 'App\Http\Controllers\FrontLoginController@forgotPass')->name('reset.email.check');
Route::get('/reset/user/password/{id}', 'App\Http\Controllers\FrontLoginController@resetPass')->name('set.pass');
Route::post('/user/password/{id}', 'App\Http\Controllers\FrontLoginController@passReset')->name('password.reset.user');

Auth::routes();

Route::post('profile/password', [
    'as' => 'profile.password',
    'uses' => 'App\Http\Controllers\ProfileController@password'
]);
Route::post('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\Admin\ProfileController@update']);
Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\Admin\ProfileController@edit']);

// Admin routes
Route::middleware(['auth', 'check.role:1'])->prefix('admin')->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\Admin\HomeController@index')->name('home');

    Route::resource('users', 'App\Http\Controllers\Admin\UserController');
    Route::post('/update/users/{id}', 'App\Http\Controllers\Admin\UserController@update')->name('users.up');
    Route::get('/users/delete/{id}', 'App\Http\Controllers\Admin\UserController@destroy')->name('users.remove');
    Route::get('/users/status/{id}', 'App\Http\Controllers\Admin\UserController@status')->name('users.status');



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


    Route::resource('vendors', 'App\Http\Controllers\Admin\VendorController');
    Route::post('/update/vendors/{id}', 'App\Http\Controllers\Admin\VendorController@update')->name('vendors.up');
    Route::get('/vendors/delete/{id}', 'App\Http\Controllers\Admin\VendorController@destroy')->name('vendors.remove');
    Route::get('/vendors/status/{id}', 'App\Http\Controllers\Admin\VendorController@status')->name('vendors.status');

    Route::resource('categories', 'App\Http\Controllers\Admin\CategoriesController');
    Route::post('/update/categories/{id}', 'App\Http\Controllers\Admin\CategoriesController@update')->name('categories.up');
    Route::get('/categories/delete/{id}', 'App\Http\Controllers\Admin\CategoriesController@destroy')->name('categories.remove');
    Route::get('/categories/status/{id}', 'App\Http\Controllers\Admin\CategoriesController@status')->name('categories.status');

    Route::resource('subcategories', 'App\Http\Controllers\Admin\SubCatController');
    Route::post('/update/subcategories/{id}', 'App\Http\Controllers\Admin\SubCatController@update')->name('subcategories.up');
    Route::get('/subcategories/delete/{id}', 'App\Http\Controllers\Admin\SubCatController@destroy')->name('subcategories.remove');
    Route::get('/subcategories/status/{id}', 'App\Http\Controllers\Admin\SubCatController@status')->name('subcategories.status');

    Route::resource('manufacturer', 'App\Http\Controllers\Admin\ManufacturerController');
    Route::post('/update/manufacturer/{id}', 'App\Http\Controllers\Admin\ManufacturerController@update')->name('manufacturer.up');
    Route::get('/manufacturer/delete/{id}', 'App\Http\Controllers\Admin\ManufacturerController@destroy')->name('manufacturer.remove');
    Route::get('/manufacturer/status/{id}', 'App\Http\Controllers\Admin\ManufacturerController@status')->name('manufacturer.status');

    Route::resource('makers', 'App\Http\Controllers\Admin\MakerController');
    Route::post('/update/makers/{id}', 'App\Http\Controllers\Admin\MakerController@update')->name('makers.up');
    Route::get('/makers/delete/{id}', 'App\Http\Controllers\Admin\MakerController@destroy')->name('makers.remove');
    Route::get('/makers/status/{id}', 'App\Http\Controllers\Admin\MakerController@status')->name('makers.status');

    Route::resource('models', 'App\Http\Controllers\Admin\ModelController');
    Route::post('/update/model/{id}', 'App\Http\Controllers\Admin\ModelController@update')->name('models.up');
    Route::get('/model/delete/{id}', 'App\Http\Controllers\Admin\ModelController@destroy')->name('models.remove');
    Route::get('/model/status/{id}', 'App\Http\Controllers\Admin\ModelController@status')->name('models.status');

    Route::resource('partType', 'App\Http\Controllers\Admin\partTypeController');
    Route::post('/update/partType/{id}', 'App\Http\Controllers\Admin\partTypeController@update')->name('partType.up');
    Route::get('/partType/delete/{id}', 'App\Http\Controllers\Admin\partTypeController@destroy')->name('partType.remove');
    Route::get('/partType/status/{id}', 'App\Http\Controllers\Admin\partTypeController@status')->name('partType.status');

    Route::resource('parts', 'App\Http\Controllers\Admin\PartsController');
    Route::post('/update/parts/{id}', 'App\Http\Controllers\Admin\partsController@update')->name('parts.up');
    Route::get('/parts/delete/{id}', 'App\Http\Controllers\Admin\partsController@destroy')->name('parts.remove');
    Route::get('/parts/status/{id}', 'App\Http\Controllers\Admin\partsController@status')->name('parts.status');

    Route::get('/site-setting/about-us', 'App\Http\Controllers\Admin\SiteController@aboutUs')->name('site.about');
    Route::post('/site-setting/about-us/{id}', 'App\Http\Controllers\Admin\SiteController@storeAboutUs')->name('store.site.about');

    Route::get('/site-setting/contact-us', 'App\Http\Controllers\Admin\SiteController@contactUs')->name('site.contact');
    Route::post('/site-setting/contact-us/{id}', 'App\Http\Controllers\Admin\SiteController@storecontactUs')->name('store.site.contact');
    Route::post('/update/contact/{id}', 'App\Http\Controllers\Admin\SiteController@update')->name('contact.up');
    Route::get('/update/contact/{id}', 'App\Http\Controllers\Admin\SiteController@edit')->name('contact.edit');
    Route::get('/contact/delete/{id}', 'App\Http\Controllers\Admin\SiteController@destroy')->name('contact.remove');
    Route::get('/contact/add', 'App\Http\Controllers\Admin\SiteController@create')->name('contact.create');
    Route::post('/contact/address/store', 'App\Http\Controllers\Admin\SiteController@store')->name('contact_us.store');

    Route::get('/site-setting/others', 'App\Http\Controllers\Admin\SiteController@othersIndex')->name('site.other.index');
    Route::get('/site-setting/others/create-page', 'App\Http\Controllers\Admin\SiteController@othersCreate')->name('site.other.create');
    Route::post('/site-setting/others/store', 'App\Http\Controllers\Admin\SiteController@Otherstore')->name('site.other.store');
    Route::get('/site-setting/others/update{data}', 'App\Http\Controllers\Admin\SiteController@Otheredit')->name('site.other.edit');
    Route::post('/site-setting/others/update{id}', 'App\Http\Controllers\Admin\SiteController@Otherupdate')->name('site.other.up');
    Route::get('site-setting/others/delete/{id}', 'App\Http\Controllers\Admin\SiteController@Otherdestroy')->name('site.other.remove');

    Route::resource('carrepair', 'App\Http\Controllers\Admin\CarRepairController');
    Route::post('/update/carrepair/{id}', 'App\Http\Controllers\Admin\CarRepairController@update')->name('carrepair.up');
    Route::get('/carrepair/delete/{id}', 'App\Http\Controllers\Admin\CarRepairController@destroy')->name('carrepair.remove');
    Route::get('/carrepair/status/{id}', 'App\Http\Controllers\Admin\CarRepairController@status')->name('carrepair.status');

    Route::resource('follow', 'App\Http\Controllers\Admin\followController');
    Route::post('/update/follow/{id}', 'App\Http\Controllers\Admin\followController@update')->name('follow.up');
    Route::get('/follow/delete/{id}', 'App\Http\Controllers\Admin\followController@destroy')->name('follow.remove');
    Route::get('/follow/status/{id}', 'App\Http\Controllers\Admin\followController@status')->name('follow.status');

    Route::resource('tool', 'App\Http\Controllers\Admin\ToolController');
    Route::post('/update/tool/{id}', 'App\Http\Controllers\Admin\ToolController@update')->name('tool.up');
    Route::get('/tool/delete/{id}', 'App\Http\Controllers\Admin\ToolController@destroy')->name('tool.remove');
    Route::get('/tool/status/{id}', 'App\Http\Controllers\Admin\ToolController@status')->name('tool.status');

    Route::get('/contact-info', 'App\Http\Controllers\Admin\ContactInfoController@index')->name('c_info.index');
    Route::get('/contact-info/delete/{id}', 'App\Http\Controllers\Admin\ContactInfoController@destroy')->name('c_info.remove');

    Route::resource('slider', 'App\Http\Controllers\Admin\SliderController');
    Route::post('/update/slider/{id}', 'App\Http\Controllers\Admin\SliderController@update')->name('slider.up');
    Route::get('/slider/delete/{id}', 'App\Http\Controllers\Admin\SliderController@destroy')->name('slider.remove');
    Route::get('/slider/status/{id}', 'App\Http\Controllers\Admin\SliderController@status')->name('slider.status');

});

// Vendor Routes
// Route::middleware(['auth', 'check.role:2',''])->prefix('vendor')->group(function () {
//     Route::resource('vparts', 'App\Http\Controllers\Merch\PartsController');
// Route::post('/v/update/parts/{id}', 'App\Http\Controllers\Merch\partsController@update')->name('v.parts.up');
// Route::get('/v/parts/delete/{id}', 'App\Http\Controllers\Merch\partsController@destroy')->name('v.parts.remove');
// Route::get('/v/parts/status/{id}', 'App\Http\Controllers\Merch\partsController@status')->name('v.parts.status');
// });
Route::middleware(['auth', 'check.role:2'])->prefix('vendor')->group(function () {
    Route::resource('vparts', 'App\Http\Controllers\Merch\vPartsController');
    Route::post('/v/update/parts/{id}', 'App\Http\Controllers\Merch\vPartsController@update')->name('vparts.up');
    Route::get('/v/parts/delete/{id}', 'App\Http\Controllers\Merch\vPartsController@destroy')->name('vparts.remove');
    Route::get('/v/parts/status/{id}', 'App\Http\Controllers\Merch\vPartsController@status')->name('vparts.status');
});

// Route for unauthorized access
Route::get('/unauthorized', function () {
    return 'Unauthorized access!';
})->name('unauthorized');
Route::post('/password', 'App\Http\Controllers\Auth\ResetPasswordController@password')->name('password.save')->middleware('checklogin');
Route::get('change/password', 'App\Http\Controllers\Auth\ResetPasswordController@passwordView')->name('password.change')->middleware('checklogin');
Route::get('/get-model-options/{parentId}', 'App\Http\Controllers\DropdownController@getModel')->name('get.model.options');
Route::get('/get-state-options/{parentId}', 'App\Http\Controllers\DropdownController@getstate')->name('get.state.options');
Route::get('/get-SubCat-options/{parentId}', 'App\Http\Controllers\DropdownController@getSubCats')->name('get.subcat.options');
Route::get('/get-state-options-mk/{parentId}', 'App\Http\Controllers\DropdownController@getstateMK')->name('get.subcat.options.mk');
Route::get('/add-to-fav/{ct}', 'App\Http\Controllers\DropdownController@AddToFav')->name('add.fav');
Route::get('/rem-to-fav/{ct}', 'App\Http\Controllers\DropdownController@RemoveFav')->name('rem.fav');
Route::get('/search-for-pro', 'App\Http\Controllers\DropdownController@searchForPro')->name('search.pro');
