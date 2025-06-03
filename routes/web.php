<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SpecialcategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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

//frontend
Route::get('/', [IndexController::class, 'indexPage']);
Route::get('/category-details/{id}', [DetailsController::class, 'categoryDetails']);
Route::get('/news-details/{slug}', [DetailsController::class, 'newsDetails']);
Route::get('/about', [DetailsController::class, 'about']);
Route::get('/contact', [DetailsController::class, 'contact']);


//backend

Route::get('/admin/login', [IndexController::class, 'loginPage']);

Route::post('admin-login', [AccessController::class, 'adminLogin']);

Route::get('/logout', [AccessController::class, 'Logout']);

 
Route::group(['middleware' => 'prevent-back-history'],function(){
	//admin dashboard

    Route::get('/dashboard', [DashboardController::class, 'Dashboard']);
    

   //categories
   Route::resource('categories', CategoryController::class);

   //sub categories
   Route::resource('subcategories', SubcategoryController::class);
   

   //specialcategories
   Route::resource('specialcategories', SpecialcategoryController::class);

   //news
   Route::resource('news', NewsController::class);

   //users
   Route::resource('users', UserController::class);

    //roles
 Route::resource('roles', RoleController::class);
   

   //settings

	Route::get('/account-settings', [SettingController::class, 'accountSettings']);
	Route::post('settings-account', [SettingController::class, 'settingAccount']);
  Route::get('/change-password', [SettingController::class, 'changePassword']);
  Route::post('password-change', [SettingController::class, 'passwordChange']);


});

//ajax requests
 
 Route::get('/decline-category/{id}', [AjaxController::class, 'declineCategory']);
 Route::get('/active-category/{id}', [AjaxController::class, 'activeCategory']);

 Route::get('/decline-subcategory/{id}', [AjaxController::class, 'declineSubcategory']);
 Route::get('/active-subcategory/{id}', [AjaxController::class, 'activeSubcategory']);

 Route::get('/active-specialcategory/{id}', [AjaxController::class, 'activeSpecialCategory']);
 Route::get('/decline-specialcategory/{id}', [AjaxController::class, 'declineSpecialCategory']);
 Route::get('/get-subcategories/{id}', [AjaxController::class, 'getSubcategories']);

 Route::get('/active-news/{id}', [AjaxController::class, 'activeNews']);
 Route::get('/decline-news/{id}', [AjaxController::class, 'declineNews']);

  Route::get('/active-user/{id}', [AjaxController::class, 'activeUser']);
 Route::get('/decline-user/{id}', [AjaxController::class, 'declineUser']);

