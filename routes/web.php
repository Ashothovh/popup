<?php

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
    return view('welcome');
});
// Route::get('/use_popup/{key}', [App\Http\Controllers\PopupController::class, 'showPopup'])->name('show_popup');

Route::group(['middleware'=>['auth']],function (){
    Route::get('/popup/{id}', [App\Http\Controllers\PopupController::class, 'changeStatus'])->name('change_status');
    Route::resource('/popups', App\Http\Controllers\PopupController::class);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Auth::routes();