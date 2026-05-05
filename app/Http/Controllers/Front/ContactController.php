<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ConfigApp;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $page   = 'contact';
        $config = ConfigApp::where('page', $page)->pluck('value', 'key');

        return view('front.contact', [
            'bannerTitle' => $config->get('banner_title', 'Contactez-nous'),
            'bannerImage' => $config->get('banner_image') ?? asset('assets/images/contact/banner.png'),
        ]);
    }
}
