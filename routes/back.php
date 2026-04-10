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
use App\Http\Controllers\Back\Items\PackController;
use App\Http\Controllers\Back\Items\MediasController;
use App\Http\Controllers\Back\Items\ImageSlideController;
use App\Http\Controllers\Back\Items\CookerController;
use App\Http\Controllers\Back\Items\PostsController;
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

    // POST routes — reCAPTCHA validated by 'recaptcha' middleware
    Route::post('/', [HomeController::class, 'store'])->middleware('recaptcha')->name('home.store');
    Route::post('/mcn-cgp', [McnController::class, 'store'])->middleware('recaptcha')->name('mcn-cgp.store');
    Route::post('/tournois', [TournoisController::class, 'store'])->middleware('recaptcha')->name('tournois.store');

    Route::group(['prefix' => 'diners', 'as' => 'diners.'], function () {
        Route::post('/', [DinersController::class, 'store'])->middleware('recaptcha')->name('store');
        Route::group(['prefix' => 'cookers', 'as' => 'cookers.'], function () {
            Route::post('/', [CookerController::class, 'store'])->name('store');
            Route::post('update/{cooker}', [CookerController::class, 'update'])->name('update');
            Route::delete('destroy/{cooker}', [CookerController::class, 'destroy'])->name('destroy');
        });
        Route::group(['prefix' => 'slides', 'as' => 'slides.'], function () {
            Route::post('/', [ImageSlideController::class, 'store'])->name('store');
            Route::delete('destroy/{imageSlide}', [ImageSlideController::class, 'destroy'])->name('destroy');
        });
    });

    Route::post('/tournois', [TournoisController::class, 'store'])->middleware('recaptcha')->name('tournois.store');
    Route::group(['prefix' => 'tournois', 'as' => 'tournois.'], function () {
        Route::group(['prefix' => 'slides', 'as' => 'slides.'], function () {
            Route::post('/', [ImageSlideController::class, 'store'])->name('store');
            Route::delete('destroy/{imageSlide}', [ImageSlideController::class, 'destroy'])->name('destroy');
        });
    });

    Route::group(['prefix' => 'experience', 'as' => 'experience.'], function () {
        Route::post('/', [ExperienceController::class, 'store'])->middleware('recaptcha')->name('experience.store');
        Route::group(['prefix' => 'packs', 'as' => 'packs.'], function () {
            Route::post('/', [PackController::class, 'store'])->name('store');
            Route::put('update/{pack}', [PackController::class, 'update'])->name('update');
            Route::delete('destroy/{pack}', [PackController::class, 'destroy'])->name('destroy');
        });
    });

    Route::post('/accompagnon', [AccompagnonController::class, 'store'])->middleware('recaptcha')->name('accompagnon.store');
    Route::post('/exposition', [ExpositionController::class, 'store'])->middleware('recaptcha')->name('exposition.store');

    Route::group(['prefix' => 'destination', 'as' => 'destination.'], function () {
        Route::post('/', [DestinationController::class, 'store'])->middleware('recaptcha')->name('store');
        Route::group(['prefix' => 'slides', 'as' => 'slides.'], function () {
            Route::post('/', [ImageSlideController::class, 'store'])->name('store');
            Route::delete('destroy/{imageSlide}', [ImageSlideController::class, 'destroy'])->name('destroy');
        });
    });

    Route::group(['prefix' => 'partenaires', 'as' => 'partenaires.'], function () {
        Route::post('/', [PartenairesController::class, 'store'])->middleware('recaptcha')->name('store');
        Route::group(['prefix' => 'logos', 'as' => 'logos.'], function () {
            Route::post('/', [PartenairesController::class, 'storeLogo'])->name('store');
            Route::delete('/destroy/{logo}', [PartenairesController::class, 'destroyLogo'])->name('destroy');
        });
    });

    Route::group(['prefix' => 'rendez-vous-AAGC', 'as' => 'rendez-vous.'], function () {
        Route::post('/', [RdvController::class, 'store'])->middleware('recaptcha')->name('store');
        Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
            Route::post('/', [PostsController::class, 'store'])->name('store');
            Route::post('update/{post}', [PostsController::class, 'update'])->name('update');
            Route::delete('destroy/{post}', [PostsController::class, 'destroy'])->name('destroy');
        });
    });

    Route::group(['prefix' => 'medias', 'as' => 'medias.'], function () {
        Route::post('/', [MediaController::class, 'store'])->middleware('recaptcha')->name('medias.store');
        Route::group(['prefix' => 'media-spaces', 'as' => 'media-spaces.'], function () {
            Route::post('/', [MediasController::class, 'store'])->name('media-spaces.store');
            Route::delete('/destroy/{mediaSpace}', [MediasController::class, 'destroy'])->name('media-spaces.destroy');
        });
    });

    Route::post('/contactez-nous', [ContactController::class, 'store'])->middleware('recaptcha')->name('contact.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('back.profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('back.profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('back.profile.destroy');
});
