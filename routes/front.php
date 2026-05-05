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
use App\Http\Controllers\Front\Form\ReservationController as FormReservationController;
use App\Http\Controllers\Front\Form\WebInvitationController;

Route::get('/langue/{locale}', function (string $locale) {
    if (in_array($locale, ['fr', 'en'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('locale.switch');

Route::get('/', [HomeController::class, 'Home'])->name('home');
Route::get('/ajax/home',         [HomeController::class,        'ajaxContent'])->name('ajax.home.content');         // route('ajax.home.content')
Route::get('/ajax/mcn',          [McnController::class,         'ajaxContent'])->name('ajax.mcn.content');          // route('ajax.mcn.content')
Route::get('/ajax/reservations', [ReservationController::class, 'ajaxContent'])->name('ajax.reservations.content'); // route('ajax.reservations.content')
Route::get('/ajax/tournois',     [TournoisController::class,    'ajaxContent'])->name('ajax.tournois.content');     // route('ajax.tournois.content')
Route::get('/mcn-cgp', [McnController::class, 'index'])->name('mcn-cgp');
Route::get('/tournois', [TournoisController::class, 'index'])->name('tournois');
Route::get('/diners', [DinersController::class, 'index'])->name('diners');
Route::get('/patrimoine-culturel', [PatrimoineController::class, 'index'])->name('patrimoine');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/exposition', [ExpositionController::class, 'index'])->name('exposition');
Route::get('/experience', [ExperienceController::class, 'index'])->name('experience');

Route::get('/accompagnon', [AccompagnonController::class, 'index'])->name('accompagnon');
Route::group(['prefix' => 'accompagnon', 'as' => 'accompagnon.ajax.'], function () {
    Route::get('/content', [AccompagnonController::class, 'ajaxContent'])->name('content');
    Route::get('/formPage', [AccompagnonController::class, 'ajaxFormPage'])->name('formPage');
});

Route::get('/africa-art-of-golf-cup', [AfricatArtController::class, 'index'])->name('africa-art');
Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations');
Route::get('/formulaire', [FormulaireController::class, 'index'])->name('formulaire');
Route::get('/formulaire/{pack}', [FormulaireController::class, 'show'])->name('formulaire.pack');
Route::get('/destination', [DestinationController::class, 'index'])->name('destination');
Route::get('/partenaires', [PartenairesController::class, 'index'])->name('partenaires');
Route::get('/rendez-vous-AAGC', [RdvController::class, 'index'])->name('rendez-vous');
Route::get('/medias', [MediaController::class, 'index'])->name('medias');
Route::get('/contactez-nous', [ContactController::class, 'index'])->name('contact');


Route::post('/form/reservation', [FormReservationController::class, 'store'])->name('form-reservation');
Route::post('/form/contact', [WebInvitationController::class, 'store'])->name('form-contact');
Route::post('/form/command-ball', [\App\Http\Controllers\Front\Form\CommandBallController::class, 'store'])->name('form-command-ball');
Route::post('/form/sponsoring', [\App\Http\Controllers\Front\Form\SponsoringController::class, 'store'])->name('form-sponsoring');
