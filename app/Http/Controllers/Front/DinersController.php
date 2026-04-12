<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ConfigApp;
use App\Models\Cooker;
use App\Models\ImageSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DinersController extends Controller
{
    public function index()
    {
        $page   = 'diners';
        $config = ConfigApp::where('page', $page)->pluck('value', 'key');

        $cities = json_decode($config->get('cities', '[]'), true) ?? [];

        return view('front.diners', [
            'bannerTitle' => $config->get('banner_title', 'Le diners'),
            'bannerImage' => $config->get('banner_image') ? Storage::url($config->get('banner_image')) : asset('assets/images/diners/banner.png'),
            'introTitle'  => $config->get('intro_title', 'Un diner sur mesure'),
            'introText'   => $config->get('intro_text', ''),
            'cities'      => $cities,
            'chefs'       => Cooker::where('deleted', false)->get(),
            'galleryImages' => ImageSlide::where('page', $page)->where('deleted', false)->orderBy('ranking')->get(),
        ]);
    }
}
