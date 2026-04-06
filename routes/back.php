<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Back\HomeController;
use App\Http\Controllers\Back\DashboardController;

use App\Http\Controllers\Back\AccompagnonController;
use App\Http\Controllers\Back\AfricatArtController;
use App\Http\Controllers\Back\BlogController;
use App\Http\Controllers\Back\ContactController;
use App\Http\Controllers\Back\DestinationController;
use App\Http\Controllers\Back\DinersController;
use App\Http\Controllers\Back\ExperienceController;
use App\Http\Controllers\Back\ExpositionController;
use App\Http\Controllers\Back\FormulaireController;
use App\Http\Controllers\Back\McnController;
use App\Http\Controllers\Back\MediaController;
use App\Http\Controllers\Back\PartenairesController;
use App\Http\Controllers\Back\PatrimoineController;
use App\Http\Controllers\Back\RdvController;
use App\Http\Controllers\Back\ReservationController;
use App\Http\Controllers\Back\TournoisController;


Route::group([
    'prefix' => 'back',
    'middleware' => ['auth', 'verified'],
    'as' => 'back.'
], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
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

    Route::get('/profile', [ProfileController::class, 'edit'])->name('back.profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('back.profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('back.profile.destroy');
});
