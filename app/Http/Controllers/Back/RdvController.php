<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\ConfigApp;
use App\Models\Post;
use Illuminate\Http\Request;

class RdvController extends Controller
{
    public function index()
    {
        $page   = 'rdv_aagc';
        $config = ConfigApp::where('page', $page)->pluck('value', 'key');

        return view('back.rdv_aagc', [
            'bannerColor'  => $config->get('banner_color', '#0A140F'),
            'sectionTitle' => $config->get('section_title', 'Nos rendez-vous'),
            'sectionText'  => $config->get('section_text', ''),
            'posts'        => Post::where('deleted', false)->orderBy('ranking')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $page = 'rdv_aagc';

        foreach (['banner_color', 'section_title', 'section_text'] as $key) {
            if ($request->has($key)) {
                ConfigApp::updateOrCreate(
                    ['key' => $key, 'page' => $page],
                    ['value' => $request->input($key) ?? '', 'type' => 'string']
                );
            }
        }

        return redirect()->back()->with('success', 'Paramètres mis à jour avec succès.');
    }
}
