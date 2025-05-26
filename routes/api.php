<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Backend\PropertiesController as BackendPropertiesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
use App\Http\Controllers\Api\Customer\PropertiesController;
use App\Http\Controllers\Api\Customer\AuthController;



// Your other routes
Route::get('/properties', [PropertiesController::class, 'index']);
Route::get('properties/{property}', [PropertiesController::class, 'show']); // Fetch service by ID

// routes/api.php
Route::middleware('auth:sanctum')->get('/user', [AuthController::class, 'getUser']);


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::prefix('admin')->middleware(['auth:sanctum', 'admin'])->group(function () {
	    Route::apiResource('properties', BackendPropertiesController::class);
	    
	    Route::put('/properties/{propertyId}/toggle-featured', [BackendPropertiesController::class, 'toggleFeatured']);

});






