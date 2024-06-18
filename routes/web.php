<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ResumeController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function(){
    Route::get('/', [AuthController::class, 'signupView']);
    Route::get('/login', [AuthController::class, 'loginView']);
    Route::post('/signup', [AuthController::class, 'signup']);
    Route::post('/login', [AuthController::class, 'login']);
});

Route::get('/logout', [AuthController::class, 'loggedout']);
Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', [ResumeController::class, 'homeView']);
    Route::get('/resume/create', [ResumeController::class, 'createResumeView']);
    Route::get('/resume/update/{id}', [ResumeController::class, 'updateResumeView']);
    Route::get('/resume/{tempId}/view/{id}', [ResumeController::class, 'resumeView']);
    Route::get('/resume/select/{id}', [ResumeController::class, 'resumeSelectView']);
    Route::post('/resume/update/{id}', [ResumeController::class, 'resumeUpdate']);
    Route::post('/resume/create', [ResumeController::class, 'resumeSave']);
    Route::get('/resume/delete/{id}', [ResumeController::class, 'resumeDelete']);
    Route::get('/resume/{id}/download/{tempId}', [PDFController::class, 'downloadPdf']);
    Route::get('admin', function () {
        return view('admin.admin');
    });
});

