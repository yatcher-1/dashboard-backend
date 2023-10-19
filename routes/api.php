<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\Adminstaff\PartyController;
use App\Http\Controllers\AdminStaff\PortalController;
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


// register routes
Route::post('/login', [AuthController::class, 'UserLogin']);

// register routes
Route::post('/register', [AuthController::class, 'UserRegister']);

Route::get('/user', [UserController::class, 'User'])->middleware('auth:clientauth');

// Portal route controller
Route::get("/portal", [PortalController::class, 'GetPortal']);

// Portal route controller
Route::get("/firm", [PartyController::class, 'GetFirm']);

