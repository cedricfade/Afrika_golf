<?php

namespace App\Http\Controllers\Back;

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

        return view('back.tournois', [
            'bannerTitle'  => $config->get('banner_title', 'Le tournois'),
            'bannerImage'  => $config->get('banner_image') ? Storage::url($config->get('banner_image')) : asset('assets/images/tournois/banner.png'),
            'galleryImages' => ImageSlide::where('page', $page)->where('deleted', false)->orderBy('ranking')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $page = 'tournois';

        $textFields = [
            'banner_title',
            'about_title',
            'about_text',
            'prog_title',
            'prog_accroche',
            'prog_text',
            'info_format_title',
            'info_format_text',
            'info_participants_title',
            'info_participants_text',
            'info_prix_title',
            'info_prix_text',
        ];
        foreach ($textFields as $key) {
            if ($request->has($key)) {
                ConfigApp::updateOrCreate(
                    ['key' => $key, 'page' => $page],
                    ['value' => $request->input($key) ?? '', 'type' => 'string']
                );
            }
        }

        if ($request->hasFile('banner_image')) {
            $old = ConfigApp::where('key', 'banner_image')->where('page', $page)->first();
            if ($old && Storage::disk('public')->exists($old->value)) {
                Storage::disk('public')->delete($old->value);
            }
            $path = $request->file('banner_image')->store("pages/{$page}", 'public');
            ConfigApp::updateOrCreate(
                ['key' => 'banner_image', 'page' => $page],
                ['value' => $path, 'type' => 'image']
            );
        }

        return redirect()->back()->with('success', 'Tournois mis à jour avec succès.');
    }
}
