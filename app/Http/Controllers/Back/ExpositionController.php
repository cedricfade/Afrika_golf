<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\ConfigApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExpositionController extends Controller
{
    public function index()
    {
        $page   = 'exposition';
        $config = ConfigApp::where('page', $page)->pluck('value', 'key');

        return view('back.exposition', [
            'citation1'       => $config->get('citation1', 'QUAND L\'ART RACONTE L\'AFRIQUE'),
            'citation2'       => $config->get('citation2', 'QUAND LE GOLF CRÉE LE LIEN.'),
            'bannerColor'     => $config->get('banner_color', '#FFFCF8'),
            'subImage'        => $config->get('sub_image')
                ? Storage::url($config->get('sub_image'))
                : asset('assets/images/exposition/image.png'),
            'imageHeader'     => $config->get('image_header')
                ? Storage::url($config->get('image_header'))
                : asset('assets/images/exposition/banner.png'),
            'expoText'        => $config->get('expo_text', ''),
            'dateVernissage'  => $config->get('date_vernissage', ''),
            'dateCatalogue'   => $config->get('date_catalogue', ''),
        ]);
    }

    public function store(Request $request)
    {
        $page = 'exposition';

        $textFields = ['citation1', 'citation2', 'banner_color', 'expo_text', 'date_vernissage', 'date_catalogue'];
        foreach ($textFields as $key) {
            if ($request->has($key)) {
                ConfigApp::updateOrCreate(
                    ['key' => $key, 'page' => $page],
                    ['value' => $request->input($key) ?? '', 'type' => 'string']
                );
            }
        }

        $imageFields = ['sub_image', 'image_header'];
        foreach ($imageFields as $key) {
            if ($request->hasFile($key)) {
                $path = $request->file($key)->store("pages/{$page}", 'public');
                ConfigApp::updateOrCreate(
                    ['key' => $key, 'page' => $page],
                    ['value' => $path, 'type' => 'image']
                );
            }
        }

        return redirect()->back()->with('success', 'Exposition mis à jour avec succès.');
    }
}
