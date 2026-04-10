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
            'bannerTitle' => $config->get('banner_title', 'Le diners'),
            'bannerImage' => $config->get('banner_image') ? Storage::url($config->get('banner_image')) : asset('assets/images/diners/banner.png'),
            'introTitle'  => $config->get('intro_title', 'Un diner sur mesure'),
            'introText'   => $config->get('intro_text', ''),
            'cities'      => $cities,
            'chefs'       => Cooker::where('deleted', false)->get(),
            'galleryImages' => ImageSlide::where('page', $page)->where('deleted', false)->orderBy('ranking')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $page = 'diners';

        foreach (['banner_title', 'intro_title', 'intro_text'] as $key) {
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

        foreach (['banner_image'] as $key) {
            if ($request->hasFile($key)) {
                $old = ConfigApp::where('key', $key)->where('page', $page)->first();
                if ($old && Storage::disk('public')->exists($old->value)) {
                    Storage::disk('public')->delete($old->value);
                }
                $path = $request->file($key)->store("pages/{$page}", 'public');
                ConfigApp::updateOrCreate(
                    ['key' => $key, 'page' => $page],
                    ['value' => $path, 'type' => 'image']
                );
            }
        }

        return redirect()->back()->with('success', 'Diners mis à jour avec succès.');
    }
}
