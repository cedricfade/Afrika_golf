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
use App\Http\Controllers\Back\ExportController;
use App\Http\Controllers\Back\ReservationController;
use App\Http\Controllers\Back\SettingController;
use App\Http\Controllers\Back\TournoisController;


Route::group([
    'prefix' => 'back',
    'middleware' => ['auth', 'verified'],
    'as' => 'back.'
], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home'); // route('back.home') for redirection after login
    Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
        Route::get('/', [SettingController::class, 'index'])->name('index'); // route('back.settings.index')
        Route::group(['prefix' => 'ajax', 'as' => 'ajax.'], function () {
            Route::get('/invitations', [SettingController::class, 'ajaxWebInvitations'])->name('invitations'); // route('back.settings.ajax.invitations')
            Route::get('/command-balls', [SettingController::class, 'ajaxCommandBalls'])->name('command-balls'); // route('back.settings.ajax.command-balls')
            Route::get('/invites', [SettingController::class, 'ajaxInvites'])->name('invites'); // route('back.settings.ajax.invites')
            Route::get('/sponsorings', [SettingController::class, 'ajaxSponsorings'])->name('sponsorings'); // route('back.settings.ajax.sponsorings')
        });
    });

    Route::group(['prefix' => 'export', 'as' => 'export.'], function () {
        Route::get('/invitations', [ExportController::class, 'invitations'])->name('invitations'); // route('back.export.invitations')
        Route::get('/command-balls', [ExportController::class, 'commandBalls'])->name('command-balls'); // route('back.export.command-balls')
        Route::get('/invites', [ExportController::class, 'invites'])->name('invites'); // route('back.export.invites')
        Route::get('/sponsorings', [ExportController::class, 'sponsorings'])->name('sponsorings'); // route('back.export.sponsorings')
    });

    Route::get('/mcn-cgp', [McnController::class, 'index'])->name('mcn-cgp'); // route('back.mcn-cgp')
    Route::get('/tournois', [TournoisController::class, 'index'])->name('tournois'); // route('back.tournois')
    Route::get('/diners', [DinersController::class, 'index'])->name('diners'); // route('back.diners')
    Route::get('/patrimoine-culturel', [PatrimoineController::class, 'index'])->name('patrimoine'); // route('back.patrimoine')
    Route::get('/blog', [BlogController::class, 'index'])->name('blog'); // route('back.blog')
    Route::get('/exposition', [ExpositionController::class, 'index'])->name('exposition'); // route('back.exposition')
    Route::get('/experience', [ExperienceController::class, 'index'])->name('experience'); // route('back.experience')
    Route::get('/accompagnon', [AccompagnonController::class, 'index'])->name('accompagnon'); // route('back.accompagnon')
    Route::get('/africa-art-of-golf-cup', [AfricatArtController::class, 'index'])->name('africa-art'); // route('back.africa-art')
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations'); // route('back.reservations')
    Route::get('/formulaire', [FormulaireController::class, 'index'])->name('formulaire'); // route('back.formulaire')
    Route::get('/destination', [DestinationController::class, 'index'])->name('destination'); // route('back.destination')
    Route::get('/partenaires', [PartenairesController::class, 'index'])->name('partenaires'); // route('back.partenaires')
    Route::get('/rendez-vous-AAGC', [RdvController::class, 'index'])->name('rendez-vous'); // route('back.rendez-vous')
    Route::get('/medias', [MediaController::class, 'index'])->name('medias'); // route('back.medias')
    Route::get('/contactez-nous', [ContactController::class, 'index'])->name('contact'); // route('back.contact')

    // AJAX save — protected by auth, no recaptcha needed
    Route::post('/ajax/home',         [HomeController::class,        'ajaxStore'])->name('ajax.home');         // route('back.ajax.home')
    Route::post('/ajax/mcn',          [McnController::class,         'ajaxStore'])->name('ajax.mcn');          // route('back.ajax.mcn')
    Route::post('/ajax/reservations', [ReservationController::class, 'ajaxStore'])->name('ajax.reservations'); // route('back.ajax.reservations')
    Route::post('/ajax/accompagnon',  [AccompagnonController::class, 'ajaxStore'])->name('ajax.accompagnon');  // route('back.ajax.accompagnon')
    Route::post('/ajax/tournois',     [TournoisController::class,    'ajaxStore'])->name('ajax.tournois');     // route('back.ajax.tournois')
    Route::group(['prefix' => 'ajax/reservations/package-items', 'as' => 'ajax.reservations.package.'], function () {
        Route::post('/',                  [ReservationController::class, 'addPackageItem'])->name('add');    // route('back.ajax.reservations.package.add')
        Route::delete('{lang}/{index}',   [ReservationController::class, 'deletePackageItem'])->name('delete'); // route('back.ajax.reservations.package.delete', ['lang'=>'fr','index'=>0])
    });

    // POST routes — reCAPTCHA validated by 'recaptcha' middleware
    Route::post('/', [HomeController::class, 'ajaxStore'])->middleware('recaptcha')->name('home.store'); // route('back.home.store')
    Route::post('/mcn-cgp', [McnController::class, 'ajaxStore'])->middleware('recaptcha')->name('mcn-cgp.store'); // route('back.mcn-cgp.store')
    Route::post('/tournois', [TournoisController::class, 'store'])->middleware('recaptcha')->name('tournois.store'); // route('back.tournois.store')

    Route::group(['prefix' => 'diners', 'as' => 'diners.'], function () {
        Route::post('/', [DinersController::class, 'store'])->middleware('recaptcha')->name('store'); // route('back.diners.store')
        Route::group(['prefix' => 'cookers', 'as' => 'cookers.'], function () {
            Route::post('/', [CookerController::class, 'store'])->name('store'); // route('back.diners.cookers.store')
            Route::post('update/{cooker}', [CookerController::class, 'update'])->name('update'); // route('back.diners.cookers.update', ['cooker' => $cooker->id])
            Route::delete('destroy/{cooker}', [CookerController::class, 'destroy'])->name('destroy'); // route('back.diners.cookers.destroy', ['cooker' => $cooker->id])
        });
        Route::group(['prefix' => 'slides', 'as' => 'slides.'], function () {
            Route::post('/', [ImageSlideController::class, 'store'])->name('store'); // route('back.diners.slides.store')
            Route::delete('destroy/{imageSlide}', [ImageSlideController::class, 'destroy'])->name('destroy'); // route('back.diners.slides.destroy', ['imageSlide' => $imageSlide->id])
        });
    });

    Route::post('/tournois', [TournoisController::class, 'store'])->middleware('recaptcha')->name('tournois.store'); // route('back.tournois.store')
    Route::group(['prefix' => 'tournois', 'as' => 'tournois.'], function () {
        Route::group(['prefix' => 'slides', 'as' => 'slides.'], function () {
            Route::post('/', [ImageSlideController::class, 'store'])->name('store'); // route('back.tournois.slides.store')
            Route::delete('destroy/{imageSlide}', [ImageSlideController::class, 'destroy'])->name('destroy'); // route('back.tournois.slides.destroy', ['imageSlide' => $imageSlide->id])
        });
    });

    Route::group(['prefix' => 'experience', 'as' => 'experience.'], function () {
        Route::post('/', [ExperienceController::class, 'store'])->middleware('recaptcha')->name('store'); // route('back.experience.store')
        Route::group(['prefix' => 'packs', 'as' => 'packs.'], function () {
            Route::post('/store', [PackController::class, 'store'])->name('store'); // route('back.experience.packs.store')
            Route::put('update/{pack}', [PackController::class, 'update'])->name('update'); // route('back.experience.packs.update', ['pack' => $pack->id])
            Route::delete('destroy/{pack}', [PackController::class, 'destroy'])->name('destroy'); // route('back.experience.packs.destroy', ['pack' => $pack->id])
        });
    });

    Route::post('/accompagnon', [AccompagnonController::class, 'store'])->middleware('recaptcha')->name('accompagnon.store'); // route('back.accompagnon.store')

    Route::group(['prefix' => 'exposition', 'as' => 'exposition.'], function () {
        Route::post('/', [ExpositionController::class, 'store'])->middleware('recaptcha')->name('store'); // route('back.exposition.store')
        Route::group(['prefix' => 'slides', 'as' => 'slides.'], function () {
            Route::post('/', [ImageSlideController::class, 'store'])->name('store'); // route('back.exposition.slides.store')
            Route::delete('destroy/{imageSlide}', [ImageSlideController::class, 'destroy'])->name('destroy'); // route('back.exposition.slides.destroy', ['imageSlide' => $imageSlide->id])
        });
    });

    Route::group(['prefix' => 'destination', 'as' => 'destination.'], function () {
        Route::post('/', [DestinationController::class, 'store'])->middleware('recaptcha')->name('store'); // route('back.destination.store')
        Route::group(['prefix' => 'slides', 'as' => 'slides.'], function () {
            Route::post('/', [ImageSlideController::class, 'store'])->name('store'); // route('back.destination.slides.store')
            Route::delete('destroy/{imageSlide}', [ImageSlideController::class, 'destroy'])->name('destroy'); // route('back.destination.slides.destroy', ['imageSlide' => $imageSlide->id])
        });
    });

    Route::group(['prefix' => 'partenaires', 'as' => 'partenaires.'], function () {
        Route::post('/', [PartenairesController::class, 'store'])->middleware('recaptcha')->name('store'); // route('back.partenaires.store')
        Route::group(['prefix' => 'logos', 'as' => 'logos.'], function () {
            Route::post('/', [PartenairesController::class, 'storeLogo'])->name('store'); // route('back.partenaires.logos.store')
            Route::delete('/destroy/{logo}', [PartenairesController::class, 'destroyLogo'])->name('destroy'); // route('back.partenaires.logos.destroy', ['logo' => $logo->id])
        });
    });

    Route::group(['prefix' => 'rendez-vous-AAGC', 'as' => 'rendez-vous.'], function () {
        Route::post('/', [RdvController::class, 'store'])->middleware('recaptcha')->name('store'); // route('back.rendez-vous.store')
        Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
            Route::post('/', [PostsController::class, 'store'])->name('store'); // route('back.rendez-vous.posts.store')
            Route::post('update/{post}', [PostsController::class, 'update'])->name('update'); // route('back.rendez-vous.posts.update', ['post' => $post->id])
            Route::delete('destroy/{post}', [PostsController::class, 'destroy'])->name('destroy'); // route('back.rendez-vous.posts.destroy', ['post' => $post->id])
        });
    });

    Route::group(['prefix' => 'medias', 'as' => 'medias.'], function () {
        Route::post('/', [MediaController::class, 'store'])->middleware('recaptcha')->name('store'); // route('back.medias.store')
        Route::group(['prefix' => 'media-spaces', 'as' => 'media-spaces.'], function () {
            Route::post('/', [MediasController::class, 'store'])->name('store'); // route('back.medias.media-spaces.store')
            Route::delete('/destroy/{mediaSpace}', [MediasController::class, 'destroy'])->name('destroy'); // route('back.medias.media-spaces.destroy', ['mediaSpace' => $mediaSpace->id])
        });
    });

    Route::post('/contactez-nous', [ContactController::class, 'store'])->middleware('recaptcha')->name('contact.store'); // route('back.contact.store')

    Route::get('/profile', [ProfileController::class, 'edit'])->name('back.profile.edit'); // route('back.profile.edit')
    Route::patch('/profile', [ProfileController::class, 'update'])->name('back.profile.update'); // route('back.profile.update')
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('back.profile.destroy'); // route('back.profile.destroy')
});
