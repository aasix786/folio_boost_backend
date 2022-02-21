<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
*/
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::post('register', [\App\Http\Controllers\ApiControllers\AuthController::class, 'register']);
Route::post('login', [\App\Http\Controllers\ApiControllers\AuthController::class, 'login']);
Route::post('get-upcoming-contests', [\App\Http\Controllers\ApiControllers\ContestController::class, 'index']);
Route::post('get-contests-details', [\App\Http\Controllers\ApiControllers\ContestController::class, 'contest_details']);
Route::post('submit-contest', [\App\Http\Controllers\ApiControllers\ContestController::class, 'submit_contest']);
Route::post('my-contests', [\App\Http\Controllers\ApiControllers\ContestController::class, 'my_contests']);