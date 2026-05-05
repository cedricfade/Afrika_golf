<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ConfigApp;
use App\Models\LogoPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartenairesController extends Controller
{
    public function index()
    {
        $page   = 'partenaires';
        $config = ConfigApp::where('page', $page)->pluck('value', 'key');

        return view('front.partenaires', [
            'bannerTitle'  => $config->get('banner_title', 'Partenaires'),
            'bannerImage'  => $config->get('banner_image')
                ? Storage::url($config->get('banner_image'))
                : asset('assets/images/partenaire/banner.png'),
            'sectionTitle' => $config->get('section_title', 'Partenaires distingués'),
            'sectionIntro' => $config->get('section_intro', ''),
            'partners'     => LogoPartner::where('deleted', false)->get(),
        ]);
    }
}
