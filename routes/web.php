<?php

use App\Http\Controllers\Frontend\FaqController;
use App\Http\Controllers\Frontend\GovernorateController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\ServicePostController;
use App\Http\Controllers\Frontend\SubServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $title="dashboard";
    $description="dashboard";
    return view('admin.dashboard',compact('title','description'));
});

Route::resource('governorates',GovernorateController::class)->except(['show']);

Route::resource('services',ServiceController::class)->except(['show']);

Route::resource('sub-services',SubServiceController::class)->except(['show']);

Route::resource('service-posts',ServicePostController::class)->except(['show']);

Route::resource('faqs',FaqController::class)->except(['show']);
