<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\ConfigApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccompagnonController extends Controller
{
    public function index()
    {
        $page   = 'accompagnon';
        $config = ConfigApp::where('page', $page)->pluck('value', 'key');

        return view('back.accompagnon', [
            'bannerTitle' => $config->get('banner_title', 'MENER UNE VIE PLEINE ET RICHE AVEC L\'AUTISME'),
            'bannerImage' => $config->get('banner_image')
                ? Storage::url($config->get('banner_image'))
                : asset('assets/images/accompagnon/banner.jpg'),
            'paragraph1'  => $config->get('paragraph1', ''),
            'formTitle'   => $config->get('form_title', 'INTERVENTION D\'ACHAT DE BALLE'),
        ]);
    }

    public function store(Request $request)
    {
        $page = 'accompagnon';

        $textFields = ['banner_title', 'paragraph1', 'form_title'];
        foreach ($textFields as $key) {
            if ($request->has($key)) {
                ConfigApp::updateOrCreate(
                    ['key' => $key, 'page' => $page],
                    ['value' => $request->input($key) ?? '', 'type' => 'string']
                );
            }
        }

        if ($request->hasFile('banner_image')) {
            $path = $request->file('banner_image')->store("pages/{$page}", 'public');
            ConfigApp::updateOrCreate(
                ['key' => 'banner_image', 'page' => $page],
                ['value' => $path, 'type' => 'image']
            );
        }

        return redirect()->back()->with('success', 'Accompagnement mis à jour avec succès.');
    }
}
