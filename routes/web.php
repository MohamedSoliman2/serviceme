<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $title="dashboard";
    $description="dashboard";
    return view('admin.dashboard',compact('title','description'));
});
