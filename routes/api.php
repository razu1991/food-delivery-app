<?php

use App\Http\Controllers\RiderLocationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//store rider location info
Route::post('/rider-location', [RiderLocationController::class, 'store']);
//find nearest rider
Route::get('/nearby-rider', [RiderLocationController::class, 'findNearbyRider']);
