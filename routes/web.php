<?php

use App\Http\Controllers\AuthController;
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
    Route::get('/resume/view/{id}', [ResumeController::class, 'resumeView']);
    Route::post('/resume/create', [ResumeController::class, 'resumeSave']);
    Route::get('admin', function () {
        return view('admin.admin');
    });
});

