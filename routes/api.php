<?php

use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::post('auth/login', 'Auth\AuthController@login')->name('auth.login');
    Route::post('auth/register', 'Auth\AuthController@register')->name('auth.register');
    Route::post('auth/forgot-password', 'Auth\AuthController@forgotPassword')->name('password.send');
    Route::get('auth/reset-password', 'Auth\AuthController@resetPasswordByToken')->name('password.token');
    Route::post('auth/reset-password', 'Auth\AuthController@resetPassword')->name('password.reset');
});

Route::middleware('auth:api')->group(function () {
    Route::post('auth/logout', 'Auth\AuthController@logout')->name('auth.logout');
    Route::get('auth/profile', 'Auth\AuthController@profile')->name('auth.me');
});
