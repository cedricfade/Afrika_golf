<?php

namespace App\Http\Controllers\Back;

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

        return view('back.experience', [
            'bannerColor' => $config->get('banner_color', '#0A140F'),
            'packs'       => Pack::where('deleted', false)->orderBy('ranking')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $page = 'experience';

        if ($request->has('banner_color')) {
            ConfigApp::updateOrCreate(
                ['key' => 'banner_color', 'page' => $page],
                ['value' => $request->input('banner_color'), 'type' => 'string']
            );
        }

        return redirect()->back()->with('success', 'Expérience mise à jour avec succès.');
    }
}
