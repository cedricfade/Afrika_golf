<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\ConfigApp;
use App\Models\Cooker;
use App\Models\ImageSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DinersController extends Controller
{
    public function index()
    {
        $page   = 'diners';
        $config = ConfigApp::where('page', $page)->pluck('value', 'key');
        $cities = json_decode($config->get('cities', '[]'), true) ?? [];

        return view('back.diners', [
            'bannerTitleFr' => $config->get('banner_title_fr', 'Le Dîner'),
            'bannerTitleEn' => $config->get('banner_title_en', 'The Dinner'),
            'bannerImage'   => $config->get('banner_image')
                ? Storage::url($config->get('banner_image'))
                : asset('assets/images/diners/banner.png'),
            'introTitleFr'  => $config->get('intro_title_fr', 'Un dîner sur mesure'),
            'introTitleEn'  => $config->get('intro_title_en', 'A tailor-made dinner'),
            'introTextFr'   => $config->get('intro_text_fr', ''),
            'introTextEn'   => $config->get('intro_text_en', ''),
            'cities'        => $cities,
            'chefs'         => Cooker::where('deleted', false)->get(),
            'galleryImages' => ImageSlide::where('page', $page)->where('deleted', false)->orderBy('ranking')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $page = 'diners';

        $textFields = [
            'banner_title_fr', 'banner_title_en',
            'intro_title_fr',  'intro_title_en',
            'intro_text_fr',   'intro_text_en',
        ];
        foreach ($textFields as $key) {
            if ($request->has($key)) {
                ConfigApp::updateOrCreate(
                    ['key' => $key, 'page' => $page],
                    ['value' => $request->input($key) ?? '', 'type' => 'string']
                );
            }
        }

        if ($request->has('city_name') || $request->has('city_date')) {
            $cities = [];
            foreach ($request->input('city_name', []) as $i => $name) {
                $cities[] = [
                    'name' => $name,
                    'date' => $request->input('city_date')[$i] ?? '',
                ];
            }
            ConfigApp::updateOrCreate(
                ['key' => 'cities', 'page' => $page],
                ['value' => json_encode($cities, JSON_UNESCAPED_UNICODE), 'type' => 'string']
            );
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

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Diners mis à jour avec succès.']);
        }

        return redirect()->back()->with('success', 'Diners mis à jour avec succès.');
    }
}
