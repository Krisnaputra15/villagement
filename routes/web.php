<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [AuthController::class, 'index']);
// google auth
Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleAuthController::class, 'GoogleCallback']);

Route::middleware('authuser')->group(function () {
    Route::get('/user/fillform', [AuthController::class, 'afterRegister']);
    Route::post('/user/fillform/submit', [AuthController::class, 'updateUserInfo']);

    Route::middleware('authuser')->group(function () {
        Route::get('/admin/home', [AdminController::class, 'index']);
        Route::get('/admin/profil', [UserController::class, 'show']);

        Route::get('/admin/layanan', [LayananController::class, 'index']);
        Route::post('/admin/layanan/store', [LayananController::class, 'store']);
        Route::get('/admin/layanan/{id}', [LayananController::class, 'show']);
        Route::post('/admin/layanan/{id}/update', [LayananController::class, 'update']);
        Route::get('/admin/layanan/{id}/delete', [LayananController::class, 'delete']);
        Route::get('/admin/layanan/{id}/changeactivestatus', [LayananController::class, 'changeActivationStatus']);

        Route::get('/admin/users', [UserController::class, 'index']);
        Route::post('/admin/users/store', [UserController::class, 'store']);
        Route::get('/admin/users/{id}', [UserController::class, 'show']);
        Route::get('/admin/users/{id}/delete', [UserController::class, 'delete']);
        Route::post('/admin/users/{id}/update', [UserController::class, 'update']);
        Route::get('/admin/users/{id}/changeactivestatus', [UserController::class, 'changeActivationStatus']);
    });
    
});

//user route

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/admin/login', [AuthController::class, 'indexAdmin']);
Route::post('/admin/login/process', [AuthController::class, 'adminLogin']);
Route::post('/admin/register/process', [AuthController::class, 'adminAdd']);




