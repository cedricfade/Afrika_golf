<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\AccompagnonController;
use App\Http\Controllers\Front\AfricatArtController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\DestinationController;
use App\Http\Controllers\Front\DinersController;
use App\Http\Controllers\Front\ExperienceController;
use App\Http\Controllers\Front\ExpositionController;
use App\Http\Controllers\Front\FormulaireController;
use App\Http\Controllers\Front\McnController;
use App\Http\Controllers\Front\MediaController;
use App\Http\Controllers\Front\PartenairesController;
use App\Http\Controllers\Front\PatrimoineController;
use App\Http\Controllers\Front\RdvController;
use App\Http\Controllers\Front\ReservationController;
use App\Http\Controllers\Front\TournoisController;

Route::get('/', [HomeController::class, 'Home'])->name('home');
Route::get('/mcn-cgp', [McnController::class, 'index'])->name('mcn-cgp');
Route::get('/tournois', [TournoisController::class, 'index'])->name('tournois');
Route::get('/diners', [DinersController::class, 'index'])->name('diners');
Route::get('/patrimoine-culturel', [PatrimoineController::class, 'index'])->name('patrimoine');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/exposition', [ExpositionController::class, 'index'])->name('exposition');
Route::get('/experience', [ExperienceController::class, 'index'])->name('experience');
Route::get('/accompagnon', [AccompagnonController::class, 'index'])->name('accompagnon');
Route::get('/africa-art-of-golf-cup', [AfricatArtController::class, 'index'])->name('africa-art');
Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations');
Route::get('/formulaire', [FormulaireController::class, 'index'])->name('formulaire');
Route::get('/destination', [DestinationController::class, 'index'])->name('destination');
Route::get('/partenaires', [PartenairesController::class, 'index'])->name('partenaires');
Route::get('/rendez-vous-AAGC', [RdvController::class, 'index'])->name('rendez-vous');
Route::get('/medias', [MediaController::class, 'index'])->name('medias');
Route::get('/contactez-nous', [ContactController::class, 'index'])->name('contact');
