<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\PropertiesController as AdminPropertiesController;
use App\Http\Controllers\Api\Owner\OwnerPropertiesController;
use App\Http\Controllers\Api\Owner\OwnerContactCRMController;

use App\Http\Controllers\Api\Admin\OwnersController;

use App\Http\Controllers\Api\Customer\ContactOwnerController;
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
	    Route::apiResource('properties', AdminPropertiesController::class);
	    
	    Route::put('/properties/{propertyId}/toggle-featured', [AdminPropertiesController::class, 'toggleFeatured']);

	      Route::get('/owners', [OwnersController::class, 'index']);        // Get all owners
    Route::post('/owners', [OwnersController::class, 'store']);       // Add new owner
    Route::put('/owners/{id}', [OwnersController::class, 'update']);  

});

Route::prefix('owner')->middleware(['auth:sanctum', 'owner'])->group(function () {
	    Route::apiResource('properties', OwnerPropertiesController::class);

        Route::apiResource('owner_crm_contact', OwnerContactCRMController::class);
	});


Route::post('/contact-owner', [ContactOwnerController::class, 'submit']);






