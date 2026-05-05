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
        $cfg = ConfigApp::where('page', 'tournois')
            ->get()->keyBy('key')->map(fn($c) => $c->value)->toArray();

        $build = function (string $locale) {
            return '<p><b>AFRICA ART GOLF CUP</b>, ' . __('tournois.intro', [], $locale) . '</p>'
                . '<p><b>' . __('tournois.golfers_title', [], $locale) . '</b> :<br>' . __('tournois.golfers_text', [], $locale) . '</p>'
                . '<p><b>' . __('tournois.non_golfers_title', [], $locale) . '</b> :<br>' . nl2br(e(__('tournois.non_golfers_text', [], $locale))) . '</p>'
                . '<p><b>' . __('tournois.gourmets_title', [], $locale) . '</b> :<br>' . nl2br(e(__('tournois.gourmets_text', [], $locale))) . '</p>'
                . '<p><b>' . __('tournois.esthete_title', [], $locale) . '</b> :<br>' . e(__('tournois.esthete_text', [], $locale)) . '</p>';
        };

        return view('back.tournois', [
            'state'         => 'back',
            'cfg'           => $cfg,
            'defaultFr'     => $build('fr'),
            'defaultEn'     => $build('en'),
            'galleryImages' => ImageSlide::where('page', 'tournois')
                ->where('deleted', false)->orderBy('ranking')->get(),
        ]);
    }

    public function ajaxStore(Request $request)
    {
        $page = 'tournois';

        $textFields = ['banner_title_fr', 'banner_title_en', 'content_fr', 'content_en'];

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
                ['value' => Storage::url($path), 'type' => 'image']
            );
        }

        return response()->json(['success' => true, 'message' => 'Sauvegardé avec succès.']);
    }
}
