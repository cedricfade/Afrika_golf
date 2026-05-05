<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ConfigApp;
use App\Models\Pack;

class FormulaireController extends Controller
{
    public function index()
    {
        $config = ConfigApp::where('page', 'experience')->pluck('value', 'key');

        return view('front.formulaire', [
            'bannerColor' => $config->get('banner_color', '#0A140F'),
        ]);
    }

    public function show(Pack $pack)
    {
        $config = ConfigApp::where('page', 'experience')->pluck('value', 'key');

        return view('front.formulaire', [
            'pack'        => $pack,
            'bannerColor' => $config->get('banner_color', '#0A140F'),
        ]);
    }
}
