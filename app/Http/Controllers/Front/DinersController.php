<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ConfigApp;
use App\Models\Cooker;
use App\Models\ImageSlide;
use Illuminate\Support\Facades\Storage;

class DinersController extends Controller
{
    public function index()
    {
        $page   = 'diners';
        $config = ConfigApp::where('page', $page)->pluck('value', 'key');
        $locale = app()->getLocale();
        $cities = json_decode($config->get('cities', '[]'), true) ?? [];

        return view('front.diners', [
            'bannerTitle'   => $locale === 'fr'
                ? $config->get('banner_title_fr', __('diners.banner_title'))
                : $config->get('banner_title_en', trans('diners.banner_title', [], 'en')),
            'bannerImage'   => $config->get('banner_image')
                ? Storage::url($config->get('banner_image'))
                : asset('assets/images/diners/banner.png'),
            'introTitle'    => $locale === 'fr'
                ? $config->get('intro_title_fr', __('diners.intro_title'))
                : $config->get('intro_title_en', trans('diners.intro_title', [], 'en')),
            'introText'     => $locale === 'fr'
                ? $config->get('intro_text_fr', '')
                : $config->get('intro_text_en', ''),
            'cities'        => $cities,
            'chefs'         => Cooker::where('deleted', false)->get(),
            'galleryImages' => ImageSlide::where('page', $page)->where('deleted', false)->orderBy('ranking')->get(),
        ]);
    }
}
