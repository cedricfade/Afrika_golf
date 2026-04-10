<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\ConfigApp;
use App\Models\MediaSpace;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {
        $page   = 'medias';
        $config = ConfigApp::where('page', $page)->pluck('value', 'key');

        return view('back.medias', [
            'bannerColor'   => $config->get('banner_color', '#0A140F'),
            'pressReleases' => MediaSpace::where('type', 'Sortie de presse')->where('deleted', false)->latest('created_at')->get(),
            'mediaKits'     => MediaSpace::where('type', 'Kit media')->where('deleted', false)->latest('created_at')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $page = 'medias';

        $request->validate(['banner_color' => 'required|string|max:7']);

        ConfigApp::updateOrCreate(
            ['key' => 'banner_color', 'page' => $page],
            ['value' => $request->input('banner_color', '#0A140F'), 'type' => 'string']
        );

        return redirect()->back()->with('success', 'Couleur de bannière mise à jour.');
    }
}
