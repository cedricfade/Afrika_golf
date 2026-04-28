<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ConfigApp;
use App\Models\ImageSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TournoisController extends Controller
{
    public function index()
    {
        $page   = 'tournois';
        $config = ConfigApp::where('page', $page)->pluck('value', 'key');

        return view('front.tournois', [
            'bannerImage'  => $config->get('banner_image') ? Storage::url($config->get('banner_image')) : asset('assets/images/tournois/banner.png'),
            'galleryImages' => ImageSlide::where('page', $page)->where('deleted', false)->orderBy('ranking')->get(),
        ]);
    }
}
