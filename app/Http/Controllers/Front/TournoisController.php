<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ConfigApp;
use App\Models\ImageSlide;

class TournoisController extends Controller
{
    public function index()
    {
        $lang    = app()->getLocale();
        $configs = ConfigApp::where('page', 'tournois')->get()->keyBy('key');
        $get     = fn($k, $d = '') => $configs->get($k)?->value ?? $d;

        return view('front.tournois', [
            'bannerSentenceTitle' => $get("banner_title_{$lang}") ?: $get('banner_title_fr', __('tournois.rendezvous')),
            'bannerImage'         => $get('banner_image', asset('assets/images/tournois/banner.png')),
            'galleryImages'       => ImageSlide::where('page', 'tournois')
                                        ->where('deleted', false)->orderBy('ranking')->get(),
        ]);
    }

    public function ajaxContent()
    {
        $lang    = app()->getLocale();
        $configs = ConfigApp::where('page', 'tournois')->get()->keyBy('key');
        $getl    = fn($k, $d = '') => $configs->get("{$k}_{$lang}")?->value
                                   ?? $configs->get("{$k}_fr")?->value
                                   ?? $d;

        $default = '<p><b>AFRICA ART GOLF CUP</b>, ' . __('tournois.intro') . '</p>'
            . '<p><b>' . __('tournois.golfers_title') . '</b> :<br>' . __('tournois.golfers_text') . '</p>'
            . '<p><b>' . __('tournois.non_golfers_title') . '</b> :<br>' . nl2br(e(__('tournois.non_golfers_text'))) . '</p>'
            . '<p><b>' . __('tournois.gourmets_title') . '</b> :<br>' . nl2br(e(__('tournois.gourmets_text'))) . '</p>'
            . '<p><b>' . __('tournois.esthete_title') . '</b> :<br>' . e(__('tournois.esthete_text')) . '</p>';

        return response()->json([
            'content' => $getl('content', $default),
        ]);
    }
}
