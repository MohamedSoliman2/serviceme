<?php

use App\Http\Controllers\Admin\AwardsController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\TestmonialController;
use App\Models\awards;
use App\Models\Blog;
use App\Models\Testimonials;
use App\Http\Controllers\Frontend\FaqController;
use App\Http\Controllers\Frontend\GovernorateController;
use App\Http\Controllers\Frontend\HomePostsController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\ServicePostController;
use App\Http\Controllers\Frontend\SubServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TermsAndConditionsController;
use App\Http\Controllers\Frontend\ContactMessageController;

Route::get('/', function () {
    $title = "dashboard";
    $description = "dashboard";
    $articals = Blog::count();
    $awards = awards::count();
    $testmonials = Testimonials::count();
    return view('admin.dashboard', compact('title', 'description', 'articals', 'awards', 'testmonials'));
})->name('home');

Route::get('/admin/blog', [BlogController::class, 'index'])->name('admin.blog.index');
Route::get('/admin/blog/create', [BlogController::class, 'create'])->name('blog.create');
Route::post('/admin/blog/store', [BlogController::class, 'store'])->name('blog.store');
Route::get('/admin/blog/edit/{id}', [BlogController::class, 'edit'])->name('blogs.edit');
Route::post('/admin/blog/update/{id}', [BlogController::class, 'update'])->name('admin.blog.update');
Route::post('/admin/blog/delete/{id}', [BlogController::class, 'delete'])->name('blogs.delete');
//testmonial
Route::get('admin/testmonial/index', [TestmonialController::class, 'index'])->name('admin.testmonial.index');
Route::get('admin/testmonial/create', [TestmonialController::class, 'create'])->name('admin.testmonial.create');
Route::post('/admin/testmonial/store', [TestmonialController::class, 'store'])->name('admin.testmonial.store');
Route::get('/admin/testmonial/edit/{id}', [TestmonialController::class, 'edit'])->name('testmonial.edit');
Route::post('/admin/testmonial/update/{id}', [TestmonialController::class, 'update'])->name('admin.testmonial.update');
Route::post('/admin/testmonial/delete/{id}', [TestmonialController::class, 'delete'])->name('testmonial.delete');
//awards
Route::get('admin/awards/index', [AwardsController::class, 'index'])->name('admin.awards.index');
Route::get('admin/awards/create', [AwardsController::class, 'create'])->name('admin.awards.create');
Route::post('/admin/awards/store', [AwardsController::class, 'store'])->name('admin.awards.store');
Route::get('/admin/awards/edit/{id}', [AwardsController::class, 'edit'])->name('awards.edit');
Route::post('/admin/awards/update/{id}', [AwardsController::class, 'update'])->name('admin.awards.update');
Route::post('/admin/awards/delete/{id}', [AwardsController::class, 'delete'])->name('awards.delete');
Route::post('/upload/pui', [BlogController::class, 'upload'])->name('upload');

Route::resource('governorates', GovernorateController::class)->except(['show']);

Route::resource('services', ServiceController::class)->except(['show']);

Route::resource('sub-services', SubServiceController::class)->except(['show']);

Route::resource('service-posts', ServicePostController::class)->except(['show']);

Route::resource('faqs', FaqController::class)->except(['show']);

Route::resource('home-posts', HomePostsController::class)->except(['show']);

Route::group(['prefix' => 'admin'], function () {
    Route::resource('terms', TermsAndConditionsController::class)->except(['create', 'edit', 'destroy', 'show']);
});

Route::resource('contacts', ContactMessageController::class)->except(['create', 'edit', 'destroy']);
