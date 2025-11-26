<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\HeroBackendController;
use App\Http\Controllers\Backend\UserBackendController;
use App\Http\Controllers\Backend\AboutBackendController;
use App\Http\Controllers\Backend\PesanBackendController;
use App\Http\Controllers\Backend\SupirBackendController;
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

//FRONTEND
Route::get('/home/frontend', [HomeFrontendController::class, 'index'])->name('frontend.home');
Route::get('/sejarah/frontend', [SejarahFrontendController::class, 'index'])->name('frontend.sejarah');

//BOOKING
Route::get('/service/frontend', [ServiceFrontendController::class, 'index'])->name('frontend.service');
Route::get('/booking', [ServiceFrontendController::class, 'booking'])->name('frontend.booking');
Route::post('/booking/store', [ServiceFrontendController::class, 'store'])->name('frontend.booking.store');

//CONTACT
Route::get('/contact/frontend', [ContactFrontendController::class, 'index'])->name('frontend.contact');
Route::post('/contact/send', [ContactFrontendController::class, 'store'])->name('contact.send');

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

//PARTNERS
Route::get('/adminpanel/partners', [PartnersBackendController::class, 'index'])->name('adminpanel.partners');
Route::get('/adminpanel/partners/create', [PartnersBackendController::class, 'create'])->name('adminpanel.partners.create');
Route::post('/adminpanel/partners/store', [PartnersBackendController::class, 'store'])->name('adminpanel.partners.store');
Route::get('/adminpanel/partners/edit/{id}', [PartnersBackendController::class, 'edit'])->name('adminpanel.partners.edit');
Route::put('/adminpanel/partners/update/{id}', [PartnersBackendController::class, 'update'])->name('adminpanel.partners.update');
Route::delete('/adminpanel/partners/delete/{id}', [PartnersBackendController::class, 'destroy'])->name('adminpanel.partners.delete');
Route::get('/adminpanel/partners/detail/{id}', [PartnersBackendController::class, 'show'])->name('adminpanel.partners.detail');

//SEJARAH
Route::get('/adminpanel/sejarah', [SejarahBackendController::class, 'index'])->name('adminpanel.sejarah');
Route::get('/adminpanel/sejarah/create', [SejarahBackendController::class, 'create'])->name('adminpanel.sejarah.create');
Route::post('/adminpanel/sejarah/store', [SejarahBackendController::class, 'store'])->name('adminpanel.sejarah.store');
Route::get('/adminpanel/sejarah/edit/{id}', [SejarahBackendController::class, 'edit'])->name('adminpanel.sejarah.edit');
Route::put('/adminpanel/sejarah/update/{id}', [SejarahBackendController::class, 'update'])->name('adminpanel.sejarah.update');
Route::get('/adminpanel/sejarah/delete/{id}', [SejarahBackendController::class, 'destroy'])->name('adminpanel.sejarah.delete');
Route::get('/adminpanel/sejarah/show/{id}', [SejarahBackendController::class, 'show'])->name('adminpanel.sejarah.show');

//SERVICE
Route::get('/adminpanel/service', [ServiceBackendController::class, 'index'])->name('adminpanel.service');
Route::get('/adminpanel/service/create', [ServiceBackendController::class, 'create'])->name('adminpanel.service.create');
Route::post('/adminpanel/service/store', [ServiceBackendController::class, 'store'])->name('adminpanel.service.store');
Route::get('/adminpanel/service/edit/{id}', [ServiceBackendController::class, 'edit'])->name('adminpanel.service.edit');
Route::get('/adminpanel/service/show/{id}', [ServiceBackendController::class, 'show'])->name('adminpanel.service.show');
Route::post('/adminpanel/service/update/{id}', [ServiceBackendController::class, 'update'])->name('adminpanel.service.update');
Route::delete('/adminpanel/service/delete/{id}', [ServiceBackendController::class, 'destroy'])->name('adminpanel.service.delete');

//TESTIMONIAL
Route::get('/adminpanel/testimonial', [TestimonialBackendController::class, 'index'])->name('adminpanel.testimonial');
Route::get('/adminpanel/testimonial/create', [TestimonialBackendController::class, 'create'])->name('adminpanel.testimonial.create');
Route::post('/adminpanel/testimonial/store', [TestimonialBackendController::class, 'store'])->name('adminpanel.testimonial.store');
Route::get('/adminpanel/testimonial/edit/{id}', [TestimonialBackendController::class, 'edit'])->name('adminpanel.testimonial.edit');
Route::put('/adminpanel/testimonial/update/{id}', [TestimonialBackendController::class, 'update'])->name('adminpanel.testimonial.update');
Route::get('/adminpanel/testimonial/detail/{id}', [TestimonialBackendController::class, 'detail'])->name('adminpanel.testimonial.detail');
Route::delete('/adminpanel/testimonial/delete/{id}', [TestimonialBackendController::class, 'destroy'])->name('adminpanel.testimonial.delete');

Route::get('/adminpanel/user', [UserBackendController::class, 'index'])->name('adminpanel.user');

//PELANGGAN
Route::get('/adminpanel/pelanggan', [PelangganBackendController::class, 'index'])->name('adminpanel.pelanggan');
Route::get('/adminpanel/pelanggan/show/{id}', [PelangganBackendController::class, 'show'])->name('adminpanel.pelanggan.show');
Route::delete('/adminpanel/pelanggan/{id}', [PelangganBackendController::class, 'destroy'])->name('adminpanel.pelanggan.destroy');
Route::post('/adminpanel/pelanggan/cancel/{id}', [PelangganBackendController::class, 'cancel'])->name('adminpanel.pelanggan.cancel');

//SUPIR
Route::get('/adminpanel/supir', [SupirBackendController::class, 'index'])->name('adminpanel.supir');
Route::get('/adminpanel/supir/create', [SupirBackendController::class, 'create'])->name('adminpanel.supir.create');
Route::post('/adminpanel/supir/store', [SupirBackendController::class, 'store'])->name('adminpanel.supir.store');
Route::get('/adminpanel/supir/edit/{id}', [SupirBackendController::class, 'edit'])->name('adminpanel.supir.edit');
Route::put('/adminpanel/supir/update/{id}', [SupirBackendController::class, 'update'])->name('adminpanel.supir.update');
Route::delete('/adminpanel/supir/delete/{id}', [SupirBackendController::class, 'destroy'])->name('adminpanel.supir.delete');
Route::get('/adminpanel/supir/show/{id}', [SupirBackendController::class, 'show'])->name('adminpanel.supir.show');

Route::get('/adminpanel/pesan', [PesanBackendController::class, 'index'])->name('adminpanel.pesan');
Route::get('/adminpanel/pesan/delete/{id}', [PesanBackendController::class, 'destroy'])->name('adminpanel.pesan.delete');
Route::get('/adminpanel/pesan/detail/{id}', [PesanBackendController::class, 'show'])->name('adminpanel.pesan.detail');
