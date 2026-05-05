<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\ConfigApp;
use App\Models\ImageSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExpositionController extends Controller
{
    public function index()
    {
        $page   = 'exposition';
        $config = ConfigApp::where('page', $page)->pluck('value', 'key');

        $defaultCitationFr = '<h3>QUAND L\'ART RACONTE L\'AFRIQUE</h3><h3>QUAND LE GOLF CRÉE LE LIEN.</h3>';
        $defaultCitationEn = '<h3>WHEN ART TELLS AFRICA\'S STORY,</h3><h3>WHEN GOLF CREATES THE LINK.</h3>';

        return view('back.exposition', [
            'citation1Fr'      => $config->get('citation1_fr', $defaultCitationFr),
            'citation1En'      => $config->get('citation1_en', $defaultCitationEn),
            'bannerColor'      => $config->get('banner_color', '#FFFCF8'),
            'subImage'         => $config->get('sub_image')
                ? Storage::url($config->get('sub_image'))
                : asset('assets/images/exposition/image.png'),
            'imageHeader'      => $config->get('image_header')
                ? Storage::url($config->get('image_header'))
                : asset('assets/images/exposition/banner.png'),
            'expoTextFr'       => $config->get('expo_text_fr', __('exposition.intro')),
            'expoTextEn'       => $config->get('expo_text_en', trans('exposition.intro', [], 'en')),
            'dateVernissageFr' => $config->get('date_vernissage_fr', __('exposition.date')),
            'dateVernissageEn' => $config->get('date_vernissage_en', trans('exposition.date', [], 'en')),
            'dateCatalogueFr'  => $config->get('date_catalogue_fr', __('exposition.catalogue')),
            'dateCatalogueEn'  => $config->get('date_catalogue_en', trans('exposition.catalogue', [], 'en')),
            'galleryImages'    => ImageSlide::whereIn('page', ['exposition', 'destination'])->where('deleted', false)->orderBy('ranking')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $page = 'exposition';

        $textFields = [
            'citation1_fr', 'citation1_en',
            'banner_color',
            'expo_text_fr', 'expo_text_en',
            'date_vernissage_fr', 'date_vernissage_en',
            'date_catalogue_fr', 'date_catalogue_en',
        ];

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
