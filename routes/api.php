<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountersController;
use App\Http\Controllers\CommentsController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v01', 'middleware' => 'api'], function () {

        Route::put('/like/{article}', [CountersController::class, 'incrementLike']);
        Route::put('/viev/{article}', [CountersController::class, 'incrementViev']);
        Route::post('/comment/{article}', [CommentsController::class, 'store']);

});
