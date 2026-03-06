<?php

use App\Http\Controllers\front\AfricatArtController;
use App\Http\Controllers\front\DestinationController;
use App\Http\Controllers\front\DinersController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\McnController;
use App\Http\Controllers\front\ReservationController;
use App\Http\Controllers\front\TournoisController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'Home'])->name('home');
Route::get('/mcn-cgp',[McnController::class,'index'])->name('mcn-cgp');
Route::get('/tournois',[TournoisController::class,'index'])->name('tournois');
Route::get('/diners',[DinersController::class,'index'])->name('diners');
Route::get('/africa-art-of-golf-cup',[AfricatArtController::class,'index'])->name('africa-art');
Route::get('/reservations',[ReservationController::class,'index'])->name('reservations');
Route::get('/destination',[DestinationController::class,'index'])->name('destination');
