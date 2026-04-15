<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ConfigApp;
use App\Models\ImageSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{
    public function index()
    {
        
        $page   = 'destination';
        $config = ConfigApp::where('page', $page)->pluck('value', 'key');

        $bannerImagePath = $config->get('banner_image');

        return view('front.destination', [
            'bannerTitle'       => $config->get('banner_title', 'Kigali, Rwanda'),
            'bannerDescription' => $config->get('banner_description', ''),
            'sousTitle'         => $config->get('sous_title', 'ÉDITION 2026'),
            'bannerImage'       => $bannerImagePath ? Storage::url($bannerImagePath) : asset('assets/images/destination/banner.png'),
            'galleryImages'     => ImageSlide::where('page', $page)->where('deleted', false)->orderBy('ranking')->get(),
        ]);
    }
}
