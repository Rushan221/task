<?php

use App\Http\Controllers\Api\CompanyCategoryController;
use App\Http\Controllers\Api\CompanyController;
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

Route::middleware('check.api.key')->prefix('v1')->group(function () {
    //category routes
    Route::get('/category', [CompanyCategoryController::class, 'index']);
    Route::post('/category', [CompanyCategoryController::class, 'store']);
    Route::get('/category/{id}', [CompanyCategoryController::class, 'show']);
    Route::put('/category/{id}', [CompanyCategoryController::class, 'update']);
    Route::delete('/category/{id}', [CompanyCategoryController::class, 'destroy']);

    //company routes
    Route::get('/company', [CompanyController::class, 'index']);
    Route::post('/company', [CompanyController::class, 'store']);
    Route::get('/company/{id}', [CompanyController::class, 'show']);
    Route::put('/company/{id}', [CompanyController::class, 'update']);
    Route::delete('/company/{id}', [CompanyController::class, 'destroy']);
});
