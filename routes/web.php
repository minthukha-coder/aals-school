<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Api\PartnershipController;
use App\Http\Controllers\Api\CambridgeCourseController;
use App\Http\Controllers\Api\AdditionalCourseController;
use App\Http\Controllers\Api\FoundationCourseController;
use App\Http\Controllers\HomeController as UserHomeController;

Route::get('/', [UserHomeController::class, 'home'])->name('home');
Route::get('/foundation-course', [UserHomeController::class, 'foundationCourse'])->name('foundation-course');
Route::get('/cambridge-course', [UserHomeController::class, 'cambridgeCourse'])->name('cambridge-course');
Route::get('/additional-course', [UserHomeController::class, 'additionalCourse'])->name('additional-course');
Route::get('/about', [UserHomeController::class, 'about'])->name('about');
Route::get('/courses', [UserHomeController::class, 'courses'])->name('courses');
Route::get('/cambridge-exam-course', [UserHomeController::class, 'cambridgeExamCourse'])->name('cambridge-exam-course');
Route::get('/contact', [UserHomeController::class, 'contact'])->name('contact');

Route::group(['prefix' => 'admin', 'controller' => AdminController::class, 'as' => 'admin.'], function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::group(['prefix' => 'home', 'controller' => HomeController::class, 'as' => 'home.'], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/edit', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
    });

    Route::group(['prefix' => 'about', 'controller' => AboutController::class, 'as' => 'about.'], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/edit', 'edit')->name('edit');
    });

    Route::group(['prefix' => 'courses', 'controller' => CourseController::class, 'as' => 'courses.'], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/edit', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
        Route::delete('/', 'destroy')->name('destroy');
    });

    Route::group(['prefix' => 'additional-courses', 'controller' => AdditionalCourseController::class, 'as' => 'additional-courses.'], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/edit', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
        Route::delete('/', 'destroy')->name('destroy');
    });

    Route::group(['prefix' => 'partnerships', 'controller' => PartnershipController::class, 'as' => 'partnerships.'], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/edit', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
        Route::delete('/', 'destroy')->name('destroy');
    });

    Route::group(['prefix' => 'foundation-courses', 'controller' => FoundationCourseController::class, 'as' => 'foundation-courses.'], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/edit', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
        Route::delete('/', 'destroy')->name('destroy');
    }); 

    Route::group(['prefix' => 'cambridge-courses', 'controller' => CambridgeCourseController::class, 'as' => 'cambridge-courses.'], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/edit', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
        Route::delete('/', 'destroy')->name('destroy');
    });	
});
