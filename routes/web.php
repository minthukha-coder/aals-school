<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\PartnershipController;
use App\Http\Controllers\InternationalCourseController;
use App\Http\Controllers\Admin\CambridgeCourseController;
use App\Http\Controllers\Admin\AdditionalCourseController;
use App\Http\Controllers\Admin\FoundationCourseController;
use App\Http\Controllers\Admin\CambridgeExamCourseController;
use App\Http\Controllers\HomeController as UserHomeController;

Route::get('/', [UserHomeController::class, 'home'])->name('home');
Route::get('/learning-pathway', [UserHomeController::class, 'learningPathway'])->name('learning-pathway');
Route::get('/foundation-courses', [UserHomeController::class, 'foundationCourse'])->name('foundation-courses');
Route::get('/cambridge-courses', [UserHomeController::class, 'cambridgeCourse'])->name('cambridge-courses');
Route::get('/additional-courses', [UserHomeController::class, 'additionalCourse'])->name('additional-courses');
Route::get('/about', [UserHomeController::class, 'about'])->name('about');
Route::get('/courses', [UserHomeController::class, 'courses'])->name('courses');
Route::get('/cambridge-exam-courses', [UserHomeController::class, 'cambridgeExamCourse'])->name('cambridge-exam-courses');
Route::get('/international-courses', [UserHomeController::class, 'internationalCourse'])->name('international-courses');
Route::get('/gallery', [UserHomeController::class, 'gallery'])->name('gallery');
Route::get('/contact', [UserHomeController::class, 'contact'])->name('contact');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'loginPage')->name('login');
    Route::post('/login', 'login')->name('login.post');
    Route::post('/logout', 'logout')->name('logout');
});



Route::group(['prefix' => 'admin', 'controller' => AdminController::class, 'as' => 'admin.', 'middleware' => ['auth.admin']], function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::group(['prefix' => 'home', 'controller' => HomeController::class, 'as' => 'home.'], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/edit', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
    });

    Route::group(['prefix' => 'about', 'controller' => AboutController::class, 'as' => 'about.'], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/edit', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
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

    Route::group(['prefix' => 'cambridge-exam-courses', 'controller' => CambridgeExamCourseController::class, 'as' => 'cambridge-exam-courses.'], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/edit', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
        Route::delete('/', 'destroy')->name('destroy');
    });

    Route::group(['prefix' => 'international-courses', 'controller' => InternationalCourseController::class, 'as' => 'international-courses.'], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/edit', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
        Route::delete('/', 'destroy')->name('destroy');
    });

    Route::group(['prefix' => 'location', 'controller' => LocationController::class, 'as' => 'location.'], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/edit', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
        Route::delete('/', 'destroy')->name('destroy');
    });

    Route::group(['prefix' => 'positions', 'controller' => PositionController::class, 'as' => 'positions.'], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/edit', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
        Route::delete('/', 'destroy')->name('destroy');
    });
});
