<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\ConfigApp;
use App\Models\ImageSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{
    public function index()
    {
        $page   = 'destination';
        $config = ConfigApp::where('page', $page)->pluck('value', 'key');

        $bannerImagePath = $config->get('banner_image');

        return view('back.destination', [
            'bannerTitle'       => $config->get('banner_title', 'Kigali, Rwanda'),
            'bannerDescription' => $config->get('banner_description', ''),
            'sousTitle'         => $config->get('sous_title', 'ÉDITION 2026'),
            'bannerImage'       => $bannerImagePath ? Storage::url($bannerImagePath) : asset('assets/images/destination/banner.png'),
            'galleryImages'     => ImageSlide::where('page', $page)->where('deleted', false)->orderBy('ranking')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $page = 'destination';

        $textFields = ['banner_title', 'banner_description', 'sous_title'];
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

        return redirect()->back()->with('success', 'Bannière mise à jour avec succès.');
    }
}
