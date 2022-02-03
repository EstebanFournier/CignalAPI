<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CertificatController;
use App\Http\Controllers\AlertController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\SendEmailController;



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

    // Auth route
    Route::put('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/createdBy', [AuthController::class, 'index']);


    // Certificats routes
    Route::get('/certificat', [CertificatController::class, 'index']);
    Route::post('/certificat', [CertificatController::class, 'store']);
    Route::get('/certificat/{id}', [CertificatController::class, 'show']);
    Route::put('/certificat/{id}', [CertificatController::class, 'update']);
    Route::delete('/certificat/{id}', [CertificatController::class, 'destroy']);

    //Send emails routes certificat
    Route::get('/emailCertificat/15', [SendEmailController::class, 'fiveteenDaysCertificat']);
    Route::get('/emailCertificat/1', [SendEmailController::class, 'oneDayCertificat']);
    Route::get('/emailCertificat/0', [SendEmailController::class, 'nowCertificat']);

    //Send email routes alert
    Route::get('/emailAlert/15', [SendEmailController::class, 'fiveteenDaysAlert']);
    Route::get('/emailAlert/1', [SendEmailController::class, 'oneDayAlert']);
    Route::get('/emailAlert/0', [SendEmailController::class, 'nowAlert']);

    // Alerts routes
    Route::get('/alert', [AlertController::class, 'index']);
    Route::post('/alert', [AlertController::class, 'store']);
    Route::get('/alert/{id}', [AlertController::class, 'show']);
    Route::put('/alert/{id}', [AlertController::class, 'update']);
    Route::delete('/alert/{id}', [AlertController::class, 'destroy']);

    // Emails routes
    Route::get('email', [EmailController::class, 'index']);
    Route::post('email', [EmailController::class, 'store']);
    Route::get('email/{id}', [EmailController::class, 'show']);
    Route::put('email/{id}', [EmailController::class, 'update']);
    Route::delete('email/{id}', [EmailController::class, 'destroy']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
