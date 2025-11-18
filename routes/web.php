<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\HeroBackendController;
use App\Http\Controllers\Backend\AboutBackendController;
use App\Http\Controllers\Frontend\HomeFrontendController;
use App\Http\Controllers\Backend\GalleryBackendController;
use App\Http\Controllers\Backend\SejarahBackendController;
use App\Http\Controllers\Backend\ServiceBackendController;
use App\Http\Controllers\Backend\PartnersBackendController;
use App\Http\Controllers\Backend\DashboardBackendController;
use App\Http\Controllers\Frontend\ContactFrontendController;
use App\Http\Controllers\Frontend\SejarahFrontendController;
use App\Http\Controllers\Frontend\ServiceFrontendController;
use App\Http\Controllers\Backend\TenagaKerjaBackendController;
use App\Http\Controllers\Backend\TestimonialBackendController;

//FRONTEND
Route::get('/home/frontend', [HomeFrontendController::class, 'index'])->name('frontend.home');
Route::get('/sejarah/frontend', [SejarahFrontendController::class, 'index'])->name('frontend.sejarah');
Route::get('/service/frontend', [ServiceFrontendController::class, 'index'])->name('frontend.service');
Route::get('/booking', function () {return view('page.frontend.service.booking');})->name('frontend.booking');
Route::get('/contact/frontend', [ContactFrontendController::class, 'index'])->name('frontend.contact');

//BACKEND
Route::get('/adminpanel/travel', [DashboardBackendController::class, 'index'])->name('adminpanel.travel');
Route::get('/adminpanel/hero', [HeroBackendController::class, 'index'])->name('adminpanel.hero');
Route::get('/adminpanel/about', [AboutBackendController::class, 'index'])->name('adminpanel.about');
Route::get('/adminpanel/gallery', [GalleryBackendController::class, 'index'])->name('adminpanel.gallery');
Route::get('/adminpanel/tenagakerja', [TenagaKerjaBackendController::class, 'index'])->name('adminpanel.tenagakerja');
Route::get('/adminpanel/partners', [PartnersBackendController::class, 'index'])->name('adminpanel.partners');
Route::get('/adminpanel/sejarah', [SejarahBackendController::class, 'index'])->name('adminpanel.sejarah');
Route::get('/adminpanel/service', [ServiceBackendController::class, 'index'])->name('adminpanel.service');
Route::get('/adminpanel/testimonial', [TestimonialBackendController::class, 'index'])->name('adminpanel.testimonial');