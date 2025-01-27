<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AwardsController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogPageController;
use App\Http\Controllers\Admin\endFooterController;
use App\Http\Controllers\Admin\footerController;
use App\Http\Controllers\Admin\locationPageController;
use App\Http\Controllers\Admin\TermController;
use App\Http\Controllers\Admin\TermsAndConditionsController;
use App\Http\Controllers\Admin\TestmonialController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Frontend\ContactMessageController;
use App\Http\Controllers\Frontend\FaqController;
use App\Http\Controllers\Frontend\GovernorateController;
use App\Http\Controllers\Frontend\HomePostsController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\ServicePostController;
use App\Http\Controllers\Frontend\SubServiceController;
use App\Models\awards;
use App\Models\Blog;
use App\Models\Testimonials;
use Illuminate\Support\Facades\Route;
Route::get('/',[AuthController::class,'index'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('authenticate');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Route::middleware('auth')->group(function(){
Route::get('/dashboard', function () {
    $title="dashboard";
    $description="dashboard";
    $articals=Blog::count();
    $awards=awards::count();
    $testmonials=Testimonials::count();
    return view('admin.dashboard',compact('title','description','articals','awards','testmonials'));
})->name('home');
Route::get('/admin/blog',[BlogController::class,'index'])->name('admin.blog.index');
Route::get('/admin/blog/create',[BlogController::class,'create'])->name('blog.create');
Route::post('/admin/blog/store',[BlogController::class,'store'])->name('blog.store');
Route::get('/admin/blog/edit/{id}',[BlogController::class,'edit'])->name('blogs.edit');
Route::post('/admin/blog/update/{id}',[BlogController::class,'update'])->name('admin.blog.update');
Route::post('/admin/blog/delete/{id}',[BlogController::class,'delete'])->name('blogs.delete');
//admin blog page
Route::get('/admin/page/blog',[BlogPageController::class,'index'])->name('admin.blog.page.index');
Route::get('/admin/page/blog/create',[BlogPageController::class,'create'])->name('blog.page.create');
Route::post('/admin/page/blog/store',[BlogPageController::class,'store'])->name('blog.page.store');
Route::get('/admin/page/blog/edit/{id}',[BlogPageController::class,'edit'])->name('blogs.page.edit');
Route::post('/admin/page/blog/update/{id}',[BlogPageController::class,'update'])->name('admin.blog.page.update');

//testmonial
Route::get('admin/testmonial/index',[TestmonialController::class,'index'])->name('admin.testmonial.index');
Route::get('admin/testmonial/create',[TestmonialController::class,'create'])->name('admin.testmonial.create');
Route::post('/admin/testmonial/store',[TestmonialController::class,'store'])->name('admin.testmonial.store');
Route::get('/admin/testmonial/edit/{id}',[TestmonialController::class,'edit'])->name('testmonial.edit');
Route::post('/admin/testmonial/update/{id}',[TestmonialController::class,'update'])->name('admin.testmonial.update');
Route::post('/admin/testmonial/delete/{id}',[TestmonialController::class,'delete'])->name('testmonial.delete');
//awards
Route::get('admin/awards/index',[AwardsController::class,'index'])->name('admin.awards.index');
Route::get('admin/awards/create',[AwardsController::class,'create'])->name('admin.awards.create');
Route::post('/admin/awards/store',[AwardsController::class,'store'])->name('admin.awards.store');
Route::get('/admin/awards/edit/{id}',[AwardsController::class,'edit'])->name('awards.edit');
Route::post('/admin/awards/update/{id}',[AwardsController::class,'update'])->name('admin.awards.update');
Route::post('/admin/awards/delete/{id}',[AwardsController::class,'delete'])->name('awards.delete');
Route::post('/upload/pui',[BlogController::class,'upload'])->name('upload');
//about
Route::get('/admin/about',[AboutController::class,'index'])->name('admin.about.index');
Route::get('/admin/about/create',[AboutController::class,'create'])->name('about.create');
Route::post('/admin/about/store',[AboutController::class,'store'])->name('about.store');
Route::get('/admin/about/edit/{id}',[AboutController::class,'edit'])->name('about.edit');
Route::post('/admin/about/update/{id}',[AboutController::class,'update'])->name('admin.about.update');
Route::post('/admin/about/delete/{id}',[AboutController::class,'delete'])->name('about.delete');
//terms
Route::get('/admin/terms',[TermController::class,'index'])->name('admin.terms.index');
Route::get('/admin/terms/create',[TermController::class,'create'])->name('terms.create');
Route::post('/admin/terms/store',[TermController::class,'store'])->name('terms.store');
Route::get('/admin/terms/edit/{id}',[TermController::class,'edit'])->name('terms.edit');
Route::post('/admin/terms/update/{id}',[TermController::class,'update'])->name('admin.terms.update');
Route::post('/admin/terms/delete/{id}',[TermController::class,'delete'])->name('terms.delete');
//location page
Route::get('/admin/location/header',[locationPageController::class,'index'])->name('admin.locationheader.index');
Route::get('/admin/location/edit/{id}',[locationPageController::class,'edit'])->name('location.edit');
Route::post('/admin/location/update/{id}',[locationPageController::class,'update'])->name('admin.location.update');
//location page description
Route::get('/admin/location/description',[locationPageController::class,'indexDescription'])->name('admin.location.description.index');
Route::get('/admin/location/description/create',[locationPageController::class,'createDescription'])->name('admin.location.description.create');
Route::post('/admin/location/description/store',[locationPageController::class,'storeDescription'])->name('admin.location.description.store');
Route::get('/admin/location/description/edit/{id}',[locationPageController::class,'editDescription'])->name('admin.location.description.edit');
Route::post('/admin/location/description/update/{id}',[locationPageController::class,'updateDescription'])->name('admin.location.description.update');
Route::post('/admin/blog/delete/{id}',[locationPageController::class,'deleteDescription'])->name('admin.location.description.delete');
//control footer
Route::get('/admin/footer/{type?}',[footerController::class,'index'])->name('admin.footer')->where('type', '[a-zA-Z]+');
Route::get('/admin/footer/create/{type}',[footerController::class,'create'])->name('admin.footer.create')->where('type', '[a-zA-Z]+');
Route::post('/admin/footer/store/{type}',[footerController::class,'store'])->name('admin.footer.store')->where('type', '[a-zA-Z]+');
Route::get('/admin/footer/edit/{type}',[footerController::class,'edit'])->name('admin.footer.edit')->where('type', '[a-zA-Z]+');
Route::post('/admin/footer/update/{type}',[footerController::class,'update'])->name('admin.footer.update')->where('type', '[a-zA-Z]+');
//end footer
Route::get('/admin/end/footer',[endFooterController::class,'index'])->name('end.admin.footer');
Route::get('/admin/end/footer/create',[endFooterController::class,'create'])->name('admin.end.footer.create');
Route::post('/admin/end/footer/store',[endFooterController::class,'store'])->name('admin.end.footer.store');
Route::get('/admin/end/footer/edit/{id}',[endFooterController::class,'edit'])->name('admin.end.footer.edit');
Route::post('/admin/endf/ooter/update/{id}',[endFooterController::class,'update'])->name('admin.end.footer.update');
Route::post('/admin/endf/ooter/delete/{id}',[endFooterController::class,'delete'])->name('admin.end.footer.delete');
//ee
Route::resource('governorates',GovernorateController::class)->except(['show']);
Route::resource('services', ServiceController::class)->except(['show']);

Route::resource('services',ServiceController::class)->except(['show']);
Route::resource('sub-services', SubServiceController::class)->except(['show']);

Route::resource('sub-services',SubServiceController::class)->except(['show']);
Route::resource('service-posts', ServicePostController::class)->except(['show']);

Route::resource('service-posts',ServicePostController::class)->except(['show']);
Route::resource('faqs', FaqController::class)->except(['show']);
Route::resource('home-posts', HomePostsController::class)->except(['show']);
//Route::group(['prefix' => 'admin'], function () {
  //  Route::resource('terms', TermsAndConditionsController::class)->except(['create', 'edit', 'destroy', 'show']);
//});
Route::get('/admin/footer/{type}',[footerController::class,'index']);

Route::resource('faqs',FaqController::class)->except(['show']);

Route::resource('contacts', ContactMessageController::class)->except(['create', 'edit', 'destroy']);
});