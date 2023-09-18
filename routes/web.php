<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\CategoryController;
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
//Roles Controller for CMS
Route::prefix('admin')->group(function(){
    Route::view('','dashboard.admin');
    Route::resource('profiles',UserProfileController::class);
    Route::resource('users',UserController::class);
    Route::resource('pages',PageController::class);
    Route::resource('posts',PostController::class);
    Route::resource('categories',CategoryController::class);
    Route::resource('roles',RoleController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
