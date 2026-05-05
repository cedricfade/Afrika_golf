<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ConfigApp;

class AccompagnonController extends Controller
{
    public function index()
    {
        $configs = ConfigApp::where('page', 'accompagnon')->get()->keyBy('key');
        $get     = fn($k, $d = '') => $configs->get($k)?->value ?? $d;
        $lang    = app()->getLocale();

        return view('front.accompagnon', [
            'bannerTitle' => $get("banner_title_{$lang}") ?: $get('banner_title_fr', __('accompagnon.banner_title')),
            'bannerImage' => $get('banner_image', asset('assets/images/accompagnon/banner.jpg')),
        ]);
    }

    public function ajaxContent()
    {
        $lang    = app()->getLocale();
        $configs = ConfigApp::where('page', 'accompagnon')->get()->keyBy('key');
        $getl    = fn($k, $d = '') => $configs->get("{$k}_{$lang}")?->value
                                   ?? $configs->get("{$k}_fr")?->value
                                   ?? $d;

        return response()->json([
            'content_text'  => $getl('content_text',  __('ajax_accompagnon.content_text')),
            'btn_programme' => $getl('btn_programme',  __('ajax_accompagnon.content_btn_programme')),
            'btn_reserve'   => $getl('btn_reserve',    __('ajax_accompagnon.content_btn_reserve')),
            'form_title'    => $getl('form_title',     __('ajax_accompagnon.form_title')),
        ]);
    }

    public function ajaxFormPage()
    {
        return view('pageContent.ajaxContent.accompagnon.formPage');
    }
}
