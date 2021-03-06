<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TodoController;
use App\Http\Controllers\SearchController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// prefix로 버전 붙이기
Route::prefix(env('APP_VERSION').'/')->group(function(){

    Route::get('todos/search',SearchController::class)->name('todos.search');

    Route::apiResource('todos',TodoController::class);
});

Auth::routes();