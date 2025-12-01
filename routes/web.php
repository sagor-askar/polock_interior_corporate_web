<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\MilestoneController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\ProjectTypeController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\WebsiteController;

Route::get('/', function () {
    return view('welcome');
});

// routes for user authentication
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// frontend routes
Route::get('contact-us', [WebsiteController::class, 'contactUs'])->name('contact-us');
Route::get('view-project', [WebsiteController::class, 'viewProject'])->name('viewProject');

// backend routes
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::resource('milestones', MilestoneController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('team', TeamMemberController::class);
    Route::resource('project-types', ProjectTypeController::class);
    Route::resource('projects', ProjectController::class);

    Route::prefix('projects/{project}')->group(function () {
        Route::get('image', [ProjectController::class, 'uploadImage'])->name('projects.image-upload');
        Route::post('images', [ProjectController::class, 'uploadImageStore'])->name('projects.images.upload.store');
        Route::delete('images/{image}', [ProjectController::class, 'projectImageDelete'])->name('projects.images.delete');
    });


});
