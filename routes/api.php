<?php

use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\HomePostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\TermsController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\LocationController;

Route::get('/services', [ServiceController::class, 'index']);

Route::get('/services/{governorateName}', [ServiceController::class, 'getServiceByGovernorateName']);

Route::get('/sub-services/{serviceId}', [ServiceController::class, 'getSubServices']);

Route::get('/service-posts/{serviceName}', [ServiceController::class, 'getServicePosts']);

Route::get('/faqs', [FaqController::class, 'index']);

Route::get('/home-posts', [HomePostController::class, 'index']);

Route::post('/contacts', [ContactController::class, 'store']);

Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/terms', [TermsController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/location', [LocationController::class, 'index']);
