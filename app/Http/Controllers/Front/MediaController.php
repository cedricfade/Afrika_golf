<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ConfigApp;
use App\Models\MediaSpace;

class MediaController extends Controller
{
    public function index()
    {
        
        $page   = 'medias';
        $config = ConfigApp::where('page', $page)->pluck('value', 'key');

        return view('front.medias', [
            'bannerColor'   => $config->get('banner_color', '#0A140F'),
            'pressReleases' => MediaSpace::where('type', 'Sortie de presse')->where('deleted', false)->latest('created_at')->get(),
            'mediaKits'     => MediaSpace::where('type', 'Kit media')->where('deleted', false)->latest('created_at')->get(),
        ]);
    }
}
