<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FaqController;

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

Route::get('/faq', [FaqController::class, 'index']);

Route::middleware('authuser')->group(function () {
    Route::get('/homepage', [HomeController::class, 'index']);
    Route::get('/user/profil', [UserController::class, 'show']);

    Route::middleware('warga.verify')->group(function () {
        Route::get('/user/fillform', [AuthController::class, 'afterRegister']);
        Route::post('/user/fillform/submit', [AuthController::class, 'updateUserInfo']);

        Route::get('/forum', [ForumController::class, 'index']);
        Route::post('/forum/store', [ForumController::class, 'store']);
        Route::get('/forum/{id}', [ForumController::class, 'show']);
        Route::get('/forum/{id}/upvote', [ForumController::class, 'upvote']);
        Route::post('/forum/{id}/comment', [ForumController::class, 'store']);
        Route::get('/forum/{id}/hapus', [ForumController::class, 'destroy']);
        Route::get('/layanan', [LayananController::class, 'index']);
        Route::get('/layanan/{id}', [LayananController::class, 'show']);
        Route::post('/layanan/{id}/buatpengajuan', [PermohonanController::class, 'store']);
        Route::get('/permohonan/{id}/getpdf', [PermohonanController::class, 'generatePDF']);
        Route::get('/permohonan/{id}/openpdf', [PermohonanController::class, 'openSurat']);
    });

    Route::middleware('admin.verify')->group(function () {
        Route::get('/admin/home', [AdminController::class, 'index']);
        Route::get('/admin/profil', [UserController::class, 'show']);

        Route::get('/admin/forums', [ForumController::class, 'index']);
        Route::get('/admin/forums/{id}', [ForumController::class, 'show']);
        Route::post('/admin/forums/{id}/respon', [ForumController::class, 'store']);
        Route::post('/admin/forums/{id}/ubahstatus', [ForumController::class, 'changeStatus']);
        Route::get('/admin/forums/{id}/buka', [ForumController::class, 'changeForumOpen']);
        Route::get('/admin/forums/{id}/tutup', [ForumController::class, 'changeForumOpen']);

        Route::get('/admin/layanan', [LayananController::class, 'index']);
        Route::post('/admin/layanan/store', [LayananController::class, 'store']);
        Route::get('/admin/layanan/{id}', [LayananController::class, 'show']);
        Route::post('/admin/layanan/{id}/update', [LayananController::class, 'update']);
        Route::get('/admin/layanan/{id}/delete', [LayananController::class, 'destroy']);
        Route::get('/admin/layanan/{id}/changeactivestatus', [LayananController::class, 'changeActivationStatus']);

        Route::get('/admin/permohonan/{id}', [PermohonanController::class, 'show']);
        Route::get('/admin/permohonan/{id}/terima', [PermohonanController::class, 'changePengajuanStatus']);
        Route::post('/admin/permohonan/{id}/tolak', [PermohonanController::class, 'changePengajuanStatus']);

        Route::get('/admin/users', [UserController::class, 'index']);
        Route::post('/admin/users/store', [UserController::class, 'store']);
        Route::get('/admin/users/{id}', [UserController::class, 'show']);
        Route::get('/admin/users/{id}/delete', [UserController::class, 'delete']);
        Route::post('/admin/users/{id}/update', [UserController::class, 'update']);
        Route::get('/admin/users/{id}/changeactivestatus', [UserController::class, 'changeActivationStatus']);

        Route::get('/admin/faqs', [FaqController::class, 'index']);
        Route::post('/admin/faqs/store', [FaqController::class, 'store']);
        Route::get('/admin/faqs/{id}', [FaqController::class, 'show']);
        Route::post('/admin/faqs/{id}/update', [FaqController::class, 'update']);
        Route::post('/admin/faqs/{id}/delete', [FaqController::class, 'destroy']);
        Route::get('/admin/faqs/{id}/changeactivestatus', [FaqController::class, 'changeActivationStatus']);
    });
});

//user route

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/admin/login', [AuthController::class, 'indexAdmin']);
Route::post('/admin/login/process', [AuthController::class, 'adminLogin']);
Route::post('/admin/register/process', [AuthController::class, 'adminAdd']);
