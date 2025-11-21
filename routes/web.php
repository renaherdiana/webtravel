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
use App\Http\Controllers\Backend\PelangganBackendController;
use App\Http\Controllers\Frontend\ContactFrontendController;
use App\Http\Controllers\Frontend\SejarahFrontendController;
use App\Http\Controllers\Frontend\ServiceFrontendController;
use App\Http\Controllers\Backend\TenagaKerjaBackendController;
use App\Http\Controllers\Backend\TestimonialBackendController;
use App\Http\Controllers\Backend\UserBackendController;

//FRONTEND
Route::get('/home/frontend', [HomeFrontendController::class, 'index'])->name('frontend.home');
Route::get('/sejarah/frontend', [SejarahFrontendController::class, 'index'])->name('frontend.sejarah');
Route::get('/service/frontend', [ServiceFrontendController::class, 'index'])->name('frontend.service');
Route::get('/booking', function () {return view('page.frontend.service.booking');})->name('frontend.booking');
Route::get('/contact/frontend', [ContactFrontendController::class, 'index'])->name('frontend.contact');

//BACKEND
Route::get('/adminpanel/travel', [DashboardBackendController::class, 'index'])->name('adminpanel.travel');

// HERO INDEX
Route::get('/adminpanel/hero', [HeroBackendController::class, 'index'])->name('adminpanel.hero');
Route::get('/adminpanel/hero/create', [HeroBackendController::class, 'create'])->name('adminpanel.hero.create');
Route::post('/adminpanel/hero/store', [HeroBackendController::class, 'store'])->name('adminpanel.hero.store');
Route::get('/adminpanel/hero/edit/{id}', [HeroBackendController::class, 'edit'])->name('adminpanel.hero.edit');
Route::get('/adminpanel/hero/detail/{id}', [HeroBackendController::class, 'detail'])->name('adminpanel.hero.detail');
Route::put('/adminpanel/hero/update/{id}', [HeroBackendController::class, 'update'])->name('adminpanel.hero.update');
Route::get('/adminpanel/hero/delete/{id}', [HeroBackendController::class, 'destroy'])->name('adminpanel.hero.delete');

// ABOUT
Route::get('/adminpanel/about', [AboutBackendController::class, 'index'])->name('adminpanel.about');
Route::get('/adminpanel/about/create', [AboutBackendController::class, 'create'])->name('adminpanel.about.create');
Route::post('/adminpanel/about/store', [AboutBackendController::class, 'store'])->name('adminpanel.about.store');
Route::get('/adminpanel/about/edit/{id}', [AboutBackendController::class, 'edit'])->name('adminpanel.about.edit');
Route::post('/adminpanel/about/update/{id}', [AboutBackendController::class, 'update'])->name('adminpanel.about.update');
Route::get('/adminpanel/about/delete/{id}', [AboutBackendController::class, 'destroy'])->name('adminpanel.about.delete');
Route::get('/adminpanel/about/detail/{id}', [AboutBackendController::class, 'detail'])->name('adminpanel.about.detail');

// GALLERY
Route::get('/adminpanel/gallery', [GalleryBackendController::class, 'index'])->name('adminpanel.gallery');
Route::get('/adminpanel/gallery/create', [GalleryBackendController::class, 'create'])->name('adminpanel.gallery.create');
Route::post('/adminpanel/gallery/store', [GalleryBackendController::class, 'store'])->name('adminpanel.gallery.store');
Route::get('/adminpanel/gallery/edit/{id}', [GalleryBackendController::class, 'edit'])->name('adminpanel.gallery.edit');
Route::put('/adminpanel/gallery/update/{id}', [GalleryBackendController::class, 'update'])->name('adminpanel.gallery.update');
Route::get('/adminpanel/gallery/detail/{id}', [GalleryBackendController::class, 'detail'])->name('adminpanel.gallery.detail');
Route::delete('/adminpanel/gallery/delete/{id}', [GalleryBackendController::class, 'destroy'])->name('adminpanel.gallery.delete');

//TENAGA KERJA
Route::get('/adminpanel/tenagakerja', [TenagaKerjaBackendController::class, 'index'])->name('adminpanel.tenagakerja');
Route::get('/adminpanel/tenagakerja/create', [TenagaKerjaBackendController::class, 'create'])->name('adminpanel.tenagakerja.create');
Route::post('/adminpanel/tenagakerja/store', [TenagaKerjaBackendController::class, 'store'])->name('adminpanel.tenagakerja.store');
Route::get('/adminpanel/tenagakerja/detail/{id}', [TenagaKerjaBackendController::class, 'detail'])->name('adminpanel.tenagakerja.detail');
Route::get('/adminpanel/tenagakerja/edit/{id}', [TenagaKerjaBackendController::class, 'edit'])->name('adminpanel.tenagakerja.edit');
Route::put('/adminpanel/tenagakerja/update/{id}', [TenagaKerjaBackendController::class, 'update'])->name('adminpanel.tenagakerja.update');
Route::delete('/adminpanel/tenagakerja/delete/{id}', [TenagaKerjaBackendController::class, 'delete'])->name('adminpanel.tenagakerja.delete');

Route::get('/adminpanel/partners', [PartnersBackendController::class, 'index'])->name('adminpanel.partners');
Route::get('/adminpanel/sejarah', [SejarahBackendController::class, 'index'])->name('adminpanel.sejarah');
Route::get('/adminpanel/service', [ServiceBackendController::class, 'index'])->name('adminpanel.service');
Route::get('/adminpanel/testimonial', [TestimonialBackendController::class, 'index'])->name('adminpanel.testimonial');
Route::get('/adminpanel/user', [UserBackendController::class, 'index'])->name('adminpanel.user');
Route::get('/adminpanel/pelanggan', [PelangganBackendController::class, 'index'])->name('adminpanel.pelanggan');