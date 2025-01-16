<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\StatController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AccoladeController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\SpecificationController;
use App\Http\Controllers\TestimonialController;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/features', [HomeController::class, 'features'])->name('features');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['prefix' => 'hero', 'as' => 'hero.'], function () {
        Route::get('', [HeroSectionController::class, 'index'])->name('index');
        Route::post('{hero}', [HeroSectionController::class, 'update'])->name('update');
    });

    Route::put('stats/{stats}', [StatController::class, 'update'])->name('stats.update');
    Route::get('stats', [StatController::class, 'index'])->name('stats.index');
    Route::post('stats/store', [StatController::class, 'store'])->name('stats.store');

    Route::get('aboutus', [AboutUsController::class, 'index'])->name('aboutus.index');
    Route::post('about/{aboutus}', [AboutUsController::class, 'update'])->name('aboutus.update');

    Route::get('accolades', [AccoladeController::class, 'index'])->name('accolades.index');
    Route::post('accolades/store', [AccoladeController::class, 'store'])->name('accolades.store');
    Route::post('accolades/{accolades}', [AccoladeController::class, 'update'])->name('accolades.update');

    Route::get('specs', [SpecificationController::class, 'index'])->name('specs.index');
    Route::post('specs/store', [SpecificationController::class, 'store'])->name('specs.store');
    Route::post('specs/{specs}', [SpecificationController::class, 'update'])->name('specs.update');

    Route::get('testimony', [TestimonialController::class, 'index'])->name('testimony.index');
    Route::post('testimony/store', [TestimonialController::class, 'store'])->name('testimony.store');
    Route::post('testimony/{test}', [TestimonialController::class, 'update'])->name('testimony.update');
    
    Route::resource('features', FeatureController::class);

    //Route::get('/calltoaction', [YourController::class, 'callToAction'])->name('calltoaction.index');

    

});
