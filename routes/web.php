<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\userCRUDController;
use App\Http\Controllers\userpoController;
use App\Http\Controllers\PoController;
use App\Http\Controllers\TestingHelperController;
use Illuminate\Support\Facades\Auth;


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
Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[PoController::class,'index'])->name('admin.dashboard');
    Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::get('settings',[AdminController::class,'settings'])->name('admin.settings');
    
   
    Route::post('update-profile-info',[AdminController::class,'updateInfo'])->name('adminUpdateInfo');
    Route::post('change-profile-picture',[AdminController::class,'updatePicture'])->name('adminPictureUpdate');
    Route::post('change-password',[AdminController::class,'changePassword'])->name('adminChangePassword');
  
});

Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[UserpoController::class,'index'])->name('user.dashboard');
    Route::get('profile',[UserController::class,'profile'])->name('user.profile');
    Route::get('settings',[UserController::class,'settings'])->name('user.settings');

    Route::post('update-profile-info',[UserController::class,'updateInfo'])->name('userUpdateInfo');
    Route::post('change-profile-picture',[UserController::class,'updatePicture'])->name('userPictureUpdate');
    Route::post('change-password',[UserController::class,'changePassword'])->name('userChangePassword');
  
    
});


Route::delete('dashboards/admin/delete-user/{id}', [adminController::class, 'destroy']);
Route::get('dashboards/admin/add-users', [userCRUDController::class, 'create']);
Route::post('dashboards/admin/add-users', [userCRUDController::class, 'store']);
Route::get('dashboards/admin/edit-user/{id}', [userCRUDController::class, 'edituser']);
Route::put('dashboards/admin/update-user/{id}', [userCRUDController::class, 'update']);






Route::get('dashboards/admin/', [PoController::class, 'index']);
Route::get('dashboards/admin/add-invoice', [PoController::class, 'create']);
Route::post('dashboards/admin/add-invoice', [PoController::class, 'store']);
Route::get('/dashboards/admin/show/{id}', [PoController::class, 'show']);
Route::get('dashboards/admin/edit-invoice/{id}', [PoController::class, 'edit']);
Route::put('dashboards/admin/update-invoice/{id}', [PoController::class, 'update']);
Route::delete('dashboards/admin/delete-invoice/{id}', [PoController::class, 'destroy']);


Route::get('dashboards/user/add-invoice', [UserpoController::class, 'create']);
Route::post('dashboards/user/add-invoice', [UserpoController::class, 'store']);
Route::get('/dashboards/user/show/{id}', [UserpoController::class, 'show']);
Route::get('dashboards/user/edit-invoice/{id}', [UserpoController::class, 'edit']);
Route::put('dashboards/user/update-invoice/{id}', [UserpoController::class, 'update']);
Route::delete('dashboards/user/delete-invoice/{id}', [UserpoController::class, 'destroy']);


Route::get('test', [TestingHelperController::class, 'index']);