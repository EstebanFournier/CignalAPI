<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CertificatController;
use App\Http\Controllers\AlertController;
use App\Http\Controllers\EmailController;


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

// Public routes
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    
    // Register route
    Route::post('/register', [AuthController::class, 'register']);

    // Certificats routes
    Route::get('/certificat', [CertificatController::class, 'index']);
    Route::put('/certificat', [CertificatController::class, 'store']);
    Route::get('/certificat/{id}', [CertificatController::class, 'show']);    
    Route::put('/certificat/{id}', [CertificatController::class, 'update']);
    Route::delete('/certificat/{id}', [CertificatController::class, 'destroy']);

    // Alerts routes
    Route::get('/alert', [AlertController::class, 'index']);
    Route::put('/alert', [AlertController::class, 'store']);
    Route::get('/alert/{id}', [AlertController::class, 'show']);
    Route::post('/alert/{id}', [AlertController::class, 'update']);
    Route::delete('/alert/{id}', [AlertController::class, 'destroy']);
    
    // Emails routes
    Route::get('email', [EmailController::class, 'index']);
    Route::put('email', [EmailController::class, 'store']);
    Route::get('email/{id}', [EmailController::class, 'show']);
    Route::post('email/{id}', [EmailController::class, 'update']);
    Route::delete('email/{id}', [EmailController::class, 'destroy']);

    // Logout route
    Route::post('/logout', [AuthController::class, 'logout']);

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});