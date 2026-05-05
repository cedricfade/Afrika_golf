<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ConfigApp;
use App\Models\LogoPartner;

class HomeController extends Controller
{
    public function Home()
    {
        $lang = app()->getLocale();
        $cfg  = ConfigApp::where('page', 'home')->pluck('value', 'key');

        $bottomImage = $lang === 'en'
            ? ($cfg->get('bottom_image_en') ?: ($cfg->get('bottom_image') ?: asset('assets_custom/home/png/aagc-golfeur.png')))
            : ($cfg->get('bottom_image') ?: asset('assets_custom/home/png/aagc-golfeur.png'));

        $bannerContent = $lang === 'fr'
            ? ($cfg->get('banner_content_fr') ?: __('ACHETER UNE BALLE DE GOLF POUR ACCOMPAGNER LES AUTISTES ADULTES'))
            : ($cfg->get('banner_content_en') ?: __('ACHETER UNE BALLE DE GOLF POUR ACCOMPAGNER LES AUTISTES ADULTES'));

        return view('front.home', [
            'partners'      => LogoPartner::where('deleted', false)->get(),
            'state'         => 'front',
            'cfg'           => $cfg->all(),
            'bannerImage'   => $cfg->get('banner_image',  asset('assets/images/home/banner.png')),
            'middleImage'   => $cfg->get('middle_image',  asset('assets_custom/home/svg/aagc-kigali.svg')),
            'bottomImage'   => $bottomImage,
            'bannerContent' => $bannerContent,
        ]);
    }

    public function ajaxContent()
    {
        $lang    = app()->getLocale();
        $configs = ConfigApp::where('page', 'home')->get()->keyBy('key');

        $get  = fn(string $k, string $d = '') => $configs->get($k)?->value ?? $d;
        $getl = fn(string $k, string $d = '') => $configs->get("{$k}_{$lang}")?->value
            ?? $configs->get("{$k}_fr")?->value
            ?? $d;

        $defaultItems = [
            __('partials.package_item1'),
            __('partials.package_item2'),
            __('partials.package_item3'),
            __('partials.package_item4'),
        ];
        $pkgItems = json_decode($get("package_items_{$lang}", 'null'), true) ?? $defaultItems;

        // Fondation images : langue ou fallback sur FR
        $fondImg = fn(string $n) => $lang === 'en'
            ? ($get("{$n}_en") ?: $get($n, asset("assets/images/home/{$n}.jpeg")))
            : $get($n, asset("assets/images/home/{$n}.jpeg"));

        return response()->json([
            // Banner
            'banner_image'   => $get('banner_image',  asset('assets/images/home/banner.png')),
            'middle_image'   => $get('middle_image',  asset('assets_custom/home/svg/aagc-kigali.svg')),
            'bottom_image'   => $lang === 'en'
                ? ($get('bottom_image_en') ?: $get('bottom_image', asset('assets_custom/home/png/aagc-golfeur.png')))
                : $get('bottom_image', asset('assets_custom/home/png/aagc-golfeur.png')),
            'banner_content' => $getl('banner_content', __('ACHETER UNE BALLE DE GOLF POUR ACCOMPAGNER LES AUTISTES ADULTES')),

            // About
            'about_image'   => $lang === 'en'
                ? ($get('about_image_en') ?: $get('about_image', asset('assets/images/home/img1.png')))
                : $get('about_image', asset('assets/images/home/img1.png')),
            'about_year'    => $get('about_year', '2026'),
            'concept_title' => $getl('concept_title', __('ajax_home.about_concept_title')),
            'concept_text'  => $getl('concept_text',  __('ajax_home.about_concept_text')),
            'mcn_title'     => $getl('mcn_title',     __('ajax_home.about_mcn_title')),
            'mcn_text'      => $getl('mcn_text',      __('ajax_home.about_mcn_text')),
            'mcn_link'      => $getl('mcn_link',      __('ajax_home.about_mcn_link')),

            // Fondations
            'fondation_img1' => $fondImg('fondation_img1') ?: asset('assets/images/home/img-2.jpeg'),
            'fondation_img2' => $fondImg('fondation_img2') ?: asset('assets/images/home/img-3.jpeg'),
            'fondation_img3' => $fondImg('fondation_img3') ?: asset('assets/images/home/img-1.jpeg'),

            // Edition
            'edition_title'   => $getl('edition_title',   __('ajax_home.edition_host')),
            'edition_city'    => $get('edition_city',     __('ajax_home.edition_city')),
            'edition_text'    => $getl('edition_text',    __('ajax_home.edition_text')),
            'edition_image'   => $get('edition_image',    asset('assets/images/home/img6.png')),
            'edition_explore' => $getl('edition_explore', __('ajax_home.edition_explore')),

            // Réservation
            'reservation_address'         => $get('reservation_address',         'Abidjan Plateau, Côte d\'Ivoire'),
            'reservation_concierge_label' => $getl('reservation_concierge_label', __('partials.concierge')),
            'reservation_concierge_email' => $get('reservation_concierge_email', 'cmangoua@mcn-cgp.com'),
            'reservation_concierge_phone' => $get('reservation_concierge_phone', '+225 07 87 05 03 15'),

            // Participation
            'participation_title' => $getl('participation_title', __('partials.participation_title')),
            'non_national_price'  => $get('non_national_price',  __('partials.non_national_price')),
            'discover_offers'     => $getl('discover_offers',    __('partials.discover_offers')),

            // Réseaux sociaux
            'social_instagram' => $get('social_instagram', ''),
            'social_linkedin'  => $get('social_linkedin',  ''),
            'social_twitter'   => $get('social_twitter',   ''),

            // Package participants
            'package_title'   => $getl('package_title',   __('partials.package_title')),
            'package_items'   => $pkgItems,
            'package_details' => $getl('package_details', __('partials.package_details')),
        ]);
    }
}
