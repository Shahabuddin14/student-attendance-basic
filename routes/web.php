<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});


Auth::routes();
//Admin routes
Route::group(['prefix'=>'admin','middleware' =>['admin','auth']], function() {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/image',[AdminController::class,'imagePage'])->name('admin-image');
    Route::post('/update/image',[AdminController::class,'updateImage'])->name('store-image');
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/update/data',[AdminController::class,'updateData'])->name('store-profile');
    Route::get('/update/password',[AdminController::class,'updatePass'])->name('admin.password');
    Route::post('/store/password',[AdminController::class,'storePassword'])->name('store-password');
    Route::get('/attendance', [AdminController::class, 'attendance'])->name('admin.attendance');
    Route::get('/details-attendance/{id}',[AdminController::class, 'nameWise']);
});

//User routes
Route::group(['prefix'=>'user','middleware' =>['user','auth']], function() {
    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/update/data',[UserController::class,'updateData'])->name('update-profile');
    Route::get('/image',[UserController::class,'imagePage'])->name('user-image');
    Route::post('/update/image',[UserController::class,'updateImage'])->name('update-image');
    Route::get('/update/password',[UserController::class,'updatePassPage'])->name('update-password');
    Route::post('/store/password',[UserController::class,'storePassword'])->name('password-store');
    Route::get('/attendance', [UserController::class, 'attendance'])->name('user.attendance');
    Route::post('/store/attendance',[UserController::class,'addAttendance'])->name('attendance-store');
});
