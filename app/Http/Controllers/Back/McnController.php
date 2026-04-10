<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\ConfigApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class McnController extends Controller
{
    public function index()
    {
        $page   = 'mcn';
        $config = ConfigApp::where('page', $page)->pluck('value', 'key');

        return view('back.mcn', [
            'bannerImage'      => $config->get('banner_image')
                ? Storage::url($config->get('banner_image'))
                : asset('assets_custom/mcn-cgp/bg.jpg'),
            'rightImage'       => $config->get('right_image')
                ? Storage::url($config->get('right_image'))
                : asset('assets_custom/mcn-cgp/logo-mcn-cgp.png'),
            'rightBottomImage' => $config->get('right_bottom_image')
                ? Storage::url($config->get('right_bottom_image'))
                : asset('assets_custom/mcn-cgp/valoriser-votre-passion.png'),
            'aboutTitle'       => $config->get('about_title', 'à propos de MCN'),
            'aboutText'        => $config->get('about_text', ''),
            'service1Title'    => $config->get('service1_title', 'Nos actions'),
            'service1Text'     => $config->get('service1_text', ''),
            'service2Title'    => $config->get('service2_title', 'Notre valeur ajoutée'),
            'service2Text'     => $config->get('service2_text', ''),
        ]);
    }

    public function store(Request $request)
    {
        $page = 'mcn';

        $textFields = [
            'about_title',
            'about_text',
            'service1_title',
            'service1_text',
            'service2_title',
            'service2_text'
        ];
        foreach ($textFields as $key) {
            if ($request->has($key)) {
                ConfigApp::updateOrCreate(
                    ['key' => $key, 'page' => $page],
                    ['value' => $request->input($key) ?? '', 'type' => 'string']
                );
            }
        }

        $imageFields = ['banner_image', 'right_image', 'right_bottom_image'];
        foreach ($imageFields as $key) {
            if ($request->hasFile($key)) {
                $path = $request->file($key)->store("pages/{$page}", 'public');
                ConfigApp::updateOrCreate(
                    ['key' => $key, 'page' => $page],
                    ['value' => $path, 'type' => 'image']
                );
            }
        }

        return redirect()->back()->with('success', 'MCN-CGP mis à jour avec succès.');
    }
}
