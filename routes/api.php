<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/use_popup/{key}', [App\Http\Controllers\api\ApiController::class, 'showPopup']);
Route::post('/add_view', [App\Http\Controllers\api\ApiController::class, 'updateViewsCount'])->name('add-view');
