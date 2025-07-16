<?php

use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\User\AboutUsController;
use App\Http\Controllers\User\BlogController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\GalleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\PricingController;
use App\Http\Controllers\User\ServicesController;
use App\Http\Controllers\User\VeterinarianController;
use App\Http\Controllers\Admin\VeterinariansController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\OrderDetailController as AdminOrderDetailController;
use App\Http\Controllers\Admin\PetManageController as AdminPetManageController;
use App\Http\Controllers\Admin\PlanManagementController;
use App\Http\Controllers\Admin\ServicesController as AdminServicesController;
use App\Http\Controllers\Admin\ProfileManagementController as AdminProfileManagementController;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('user.home');
// });

// HomeController
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

// AboutUsController
Route::controller(AboutUsController::class)->group(function () {
    Route::get('/about-us', 'index')->name('user.about');
});

// VeterinarianController
Route::controller(VeterinarianController::class)->group(function () {
    Route::get('/vet', 'index')->name('user.veterinarian');
});

// ServicesController
Route::controller(ServicesController::class)->group(function () {
    Route::get('/services-page', 'index')->name('user.services-page');
});

// GalleryController
Route::controller(GalleryController::class)->group(function () {
    Route::get('/gallery', 'index')->name('user.gallery');
});

// PricingController
Route::controller(PricingController::class)->group(function () {
    Route::get('/pricing', 'index')->name('user.pricing');
    Route::get('/plan-details/', 'planDetails')->name('user.plan_details');
    Route::post('/plan-details/store', 'planDetailsStore')->name('user.plan_details_store');
    Route::get('/plan-info', 'planInfo')->name('user.planInfo');

});

// BlogController
Route::controller(BlogController::class)->group(function () {
    Route::get('/blog', 'index')->name('user.blog');
    Route::get('/blog/single/{id}', 'SingleBlog')->name('user.single_blog');
});

// ContactController
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'index')->name('user.contact');
    Route::post('/contact/store', 'store')->name('user.contact.store');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth:admin')->group(function () {
        // Route::get('/dashboard', function () {
        //     return view('admin.home');
        // })->name('admin.home');

        Route::controller(AdminHomeController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('admin.home');
        });

        Route::controller(VeterinariansController::class)->group(function () {
            Route::get('/vet', 'index')->name('admin.veterinarians.index');
            Route::post('/vet/store', 'store')->name('admin.veterinarians.store');
            Route::get('/vet/list', 'display')->name('admin.veterinarians.list');
            Route::delete('/vet/delete/{id}', 'destroy')->name('admin.veterinarians.delete');
            Route::get('/vet/edit/{id}', 'edit')->name('admin.veterinarians.edit');
            Route::post('/vet/update/{id}', 'update')->name('admin.veterinarians.update');
        });

        Route::controller(AdminGalleryController::class)->group(function () {
            Route::get('/gallery', 'index')->name('admin.gallery.index');
            Route::post('/gallery/store', 'store')->name('admin.gallery.store');
            Route::get('/gallery/list', 'display')->name('admin.gallery.list');
            Route::delete('/gallery/delete/{id}', 'destroy')->name('admin.gallery.delete');
            Route::get('/gallery/edit/{id}', 'edit')->name('admin.gallery.edit');
            Route::post('/gallery/update/{id}', 'update')->name('admin.gallery.update');
        });

        Route::controller(AdminBlogController::class)->group(function () {
            Route::get('/blogs', 'index')->name('admin.blog.index');
            Route::post('/blogs/store', 'store')->name('admin.blog.store');
            Route::get('/blogs/list', 'display')->name('admin.blog.list');
            Route::delete('/blogs/delete/{id}', 'destroy')->name('admin.blog.delete');
            Route::get('/blogs/edit/{id}', 'edit')->name('admin.blog.edit');
            Route::post('/blogs/update/{id}', 'update')->name('admin.blog.update');
        });

        Route::controller(PlanManagementController::class)->group(function () {
            Route::get('/plan-manage', 'index')->name('admin.plan-manage.index');
            Route::post('/plan-manage/store', 'store')->name('admin.plan-manage.store');
            Route::get('/plan-manage/list', 'display')->name('admin.plan-manage.list');
            Route::delete('/plan-manage/delete/{id}', 'destroy')->name('admin.plan-manage.delete');
            Route::get('/plan-manage/edit/{id}', 'edit')->name('admin.plan-manage.edit');
            Route::post('/plan-manage/update/{id}', 'update')->name('admin.plan-manage.update');
        });

        Route::controller(AdminServicesController::class)->group(function () {
            Route::get('/addsServices', 'index')->name('admin.addsServices.index'); 
            Route::post('/addsServices/store', 'store')->name('admin.addsServices.store');
            Route::get('/addsServices/list', 'display')->name('admin.addsServices.list');
            Route::delete('/addsServices/delete/{id}', 'destroy')->name('admin.addsServices.delete');
            Route::get('/addsServices/edit/{id}', 'edit')->name('admin.addsServices.edit');
            Route::post('/addsServices/update/{id}', 'update')->name('admin.addsServices.update');
        });

        // OrderDetailController
        Route::controller(AdminPetManageController::class)->group(function () {
            Route::get('/pet', 'index')->name('admin.pet.index');
            Route::post('/pet/store', 'store')->name('admin.pet.store');
            Route::get('/pet/list', 'display')->name('admin.pet.list');
            Route::delete('/pet/delete/{id}', 'destroy')->name('admin.pet.delete');
            Route::get('/pet/edit/{id}', 'edit')->name('admin.pet.edit');
            Route::post('/pet/update/{id}', 'update')->name('admin.pet.update');

        });

        // OrderDetailController
        Route::controller(AdminOrderDetailController::class)->group(function () {
            Route::get('/order-details', 'display')->name('admin.order-details');
        });

        // ProfileManagementController
        Route::controller(AdminProfileManagementController::class)->group(function () {
            Route::get('/profile/details', 'profileDetails')->name('admin.profileDetails');
        });
    });
});
