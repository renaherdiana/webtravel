<?php

use App\Http\Controllers\Backend\DashboardBackendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeFrontendController;
use App\Http\Controllers\Frontend\SejarahFrontendController;
use App\Http\Controllers\Frontend\ServiceFrontendController;
use App\Http\Controllers\Frontend\ContactFrontendController;

//FRONTEND
Route::get('/home/frontend', [HomeFrontendController::class, 'index'])->name('frontend.home');
Route::get('/sejarah/frontend', [SejarahFrontendController::class, 'index'])->name('frontend.sejarah');
Route::get('/service/frontend', [ServiceFrontendController::class, 'index'])->name('frontend.service');
Route::get('/booking', function () {return view('page.frontend.service.booking');})->name('frontend.booking');
Route::get('/contact/frontend', [ContactFrontendController::class, 'index'])->name('frontend.contact');

//BACKEND
Route::get('/adminpanel/travel', [DashboardBackendController::class, 'index'])->name('adminpanel.travel');

