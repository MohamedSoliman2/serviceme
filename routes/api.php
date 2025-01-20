<?php

use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\HomePostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\TermsController;
use App\Http\Controllers\Api\ContactController;

Route::get('/services', [ServiceController::class, 'index']);

Route::get('/sub-services/{serviceId}', [ServiceController::class, 'getSubServices']);

Route::get('/service-posts/{serviceId}', [ServiceController::class, 'getServicePosts']);

Route::get('/faqs', [FaqController::class, 'index']);

Route::get('/home-posts', [HomePostController::class, 'index']);

Route::get('/terms', [TermsController::class, 'index']);

Route::post('/contacts', [ContactController::class, 'store']);
