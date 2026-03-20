<?php

use App\Http\Controllers\front\AfricatArtController;
use App\Http\Controllers\front\BlogController;
use App\Http\Controllers\front\ContactController;
use App\Http\Controllers\front\DestinationController;
use App\Http\Controllers\front\DinersController;
use App\Http\Controllers\front\ExperienceController;
use App\Http\Controllers\front\ExpositionController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\McnController;
use App\Http\Controllers\front\MediaController;
use App\Http\Controllers\front\PartenairesController;
use App\Http\Controllers\front\PatrimoineController;
use App\Http\Controllers\front\RdvController;
use App\Http\Controllers\front\ReservationController;
use App\Http\Controllers\front\TournoisController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'Home'])->name('home');
Route::get('/mcn-cgp',[McnController::class,'index'])->name('mcn-cgp');
Route::get('/tournois',[TournoisController::class,'index'])->name('tournois');
Route::get('/diners',[DinersController::class,'index'])->name('diners');
Route::get('/patrimoine-culturel',[PatrimoineController::class,'index'])->name('patrimoine');
Route::get('/blog',[BlogController::class,'index'])->name('blog');
Route::get('/exposition',[ExpositionController::class,'index'])->name('exposition');
Route::get('/experience',[ExperienceController::class,'index'])->name('experience');
Route::get('/africa-art-of-golf-cup',[AfricatArtController::class,'index'])->name('africa-art');
Route::get('/reservations',[ReservationController::class,'index'])->name('reservations');
Route::get('/destination',[DestinationController::class,'index'])->name('destination');
Route::get('/partenaires',[PartenairesController::class,'index'])->name('partenaires');
Route::get('/rendez-vous-AAGC',[RdvController::class,'index'])->name('rendez-vous');
Route::get('/medias',[MediaController::class,'index'])->name('medias');
Route::get('/contactez-nous',[ContactController::class,'index'])->name('contact');
