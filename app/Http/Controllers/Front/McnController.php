<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ConfigApp;

class McnController extends Controller
{
    public function index()
    {
        $lang    = app()->getLocale();
        $configs = ConfigApp::where('page', 'mcn')->get()->keyBy('key');
        $get     = fn($k, $d = '') => $configs->get($k)?->value ?? $d;

        $default = asset('assets_custom/mcn-cgp/valoriser-votre-passion.png');

        return view('front.mcn', [
            'bannerImage'      => $get('banner_image',  asset('assets_custom/mcn-cgp/bg.jpg')),
            'rightImage'       => $get('right_image',   asset('assets_custom/mcn-cgp/logo-mcn-cgp.png')),
            'rightBottomImage' => $lang === 'en'
                ? ($get('right_bottom_image_en') ?: $get('right_bottom_image', $default))
                : $get('right_bottom_image', $default),
        ]);
    }

    public function ajaxContent()
    {
        $lang    = app()->getLocale();
        $configs = ConfigApp::where('page', 'mcn')->get()->keyBy('key');
        $getl    = fn($k, $d = '') => $configs->get("{$k}_{$lang}")?->value
                                   ?? $configs->get("{$k}_fr")?->value
                                   ?? $d;

        $introDefault = '<p>' . __('mcn.intro') . '</p>'
            . '<ul><li>' . __('mcn.bullet_admin') . '</li><li>' . __('mcn.bullet_conseil') . '</li>'
            . '<li>' . __('mcn.bullet_conservation') . '</li><li>' . __('mcn.bullet_valorisation') . '</li></ul>'
            . '<p>' . __('mcn.intro_closing') . '</p>'
            . '<p><a href="https://www.mcn-cgp.com/">' . __('mcn.learn_more') . '</a></p>';

        return response()->json([
            'intro_text'     => $getl('intro_text',     $introDefault),
            'service1_title' => $getl('service1_title', __('mcn.actions_title')),
            'service1_text'  => $getl('service1_text',  __('mcn.actions_text')),
            'service2_title' => $getl('service2_title', __('mcn.value_title')),
            'service2_text'  => $getl('service2_text',
                __('mcn.value_text1') . '<br><br>' .
                __('mcn.value_text2') . '<br><br>' .
                __('mcn.value_text3')
            ),
        ]);
    }
}
