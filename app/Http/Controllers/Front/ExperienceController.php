<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ConfigApp;
use App\Models\Pack;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $page   = 'experience';
        $config = ConfigApp::where('page', $page)->pluck('value', 'key');

        return view('front.experience', [
            'bannerColor' => $config->get('banner_color', '#0A140F'),
            'packs' => Pack::where('deleted', false)->orderBy('ranking')->get(),
        ]);
    }
}
