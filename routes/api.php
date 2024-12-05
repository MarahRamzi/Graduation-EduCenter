<?php

use Illuminate\Http\Request;
use App\Http\Middleware\CheckPassord;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TeacherResource;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\Api\CategoryController;
//use App\Http\Controllers\TeacherResource;

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

// Route::group(['middleware'=>['api','checkPassword'],'namespace' => 'Api'], function(){

//     Route::get('category' ,[CategoryController::class ,'index']);

// });

Route::group(['middleware'=>['api','CheckPassord','ChangeLanguage'],'namespace' => 'Api'], function(){

    Route::get('category' ,[CategoryController::class ,'index']);
    Route::post('categoryId' ,[CategoryController::class ,'categoryId']);
});

Route::group(['middleware'=>['api','CheckPassord','ChangeLanguage','CheckAdminToken:admin_api'],'namespace' => 'Api'], function(){

    Route::get('category' ,[CategoryController::class ,'index']);

    Route::group(['prefix'=>'ap'],function(){
    Route::get('login',[AuthController::class,'login']);
});

});

// Route::apiResource('teachers','App\Http\Controllers\Api\TeacherController');
