<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ConfigApp;
use App\Models\ImageSlide;
use Illuminate\Support\Facades\Storage;

class ExpositionController extends Controller
{
    public function index()
    {
        $page   = 'exposition';
        $config = ConfigApp::where('page', $page)->pluck('value', 'key');
        $locale = app()->getLocale();

        $defaultCitationFr = '<h3>QUAND L\'ART RACONTE L\'AFRIQUE</h3><h3>QUAND LE GOLF CRÉE LE LIEN.</h3>';
        $defaultCitationEn = '<h3>WHEN ART TELLS AFRICA\'S STORY,</h3><h3>WHEN GOLF CREATES THE LINK.</h3>';

        return view('front.exposition', [
            'citation1'      => $locale === 'fr'
                ? $config->get('citation1_fr', $defaultCitationFr)
                : $config->get('citation1_en', $defaultCitationEn),
            'bannerColor'    => $config->get('banner_color', '#FFFCF8'),
            'subImage'       => $config->get('sub_image')
                ? Storage::url($config->get('sub_image'))
                : asset('assets/images/exposition/image.png'),
            'imageHeader'    => $config->get('image_header')
                ? Storage::url($config->get('image_header'))
                : asset('assets/images/exposition/banner.png'),
            'expoText'       => $locale === 'fr'
                ? $config->get('expo_text_fr', __('exposition.intro'))
                : $config->get('expo_text_en', trans('exposition.intro', [], 'en')),
            'dateVernissage' => $locale === 'fr'
                ? $config->get('date_vernissage_fr', __('exposition.date'))
                : $config->get('date_vernissage_en', trans('exposition.date', [], 'en')),
            'dateCatalogue'  => $locale === 'fr'
                ? $config->get('date_catalogue_fr', __('exposition.catalogue'))
                : $config->get('date_catalogue_en', trans('exposition.catalogue', [], 'en')),
            'galleryImages'  => ImageSlide::whereIn('page', ['exposition', 'destination'])->where('deleted', false)->orderBy('ranking')->get(),
        ]);
    }
}
