<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\ConfigApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\LogoPartner;

class HomeController extends Controller
{
    public function index()
    {
        $cfg = ConfigApp::where('page', 'home')
            ->get()
            ->keyBy('key')
            ->map(fn($c) => $c->value)
            ->toArray();

        $defaultItems = [
            __('partials.package_item1'),
            __('partials.package_item2'),
            __('partials.package_item3'),
            __('partials.package_item4'),
        ];

        $packageItemsFr = json_decode($cfg['package_items_fr'] ?? 'null', true) ?? $defaultItems;
        $packageItemsEn = json_decode($cfg['package_items_en'] ?? 'null', true) ?? $defaultItems;

        return view('back.home', [
            'partners'       => LogoPartner::where('deleted', false)->get(),
            'state'          => 'back',
            'cfg'            => $cfg,
            'packageItemsFr' => $packageItemsFr,
            'packageItemsEn' => $packageItemsEn,
        ]);
    }

    public function ajaxStore(Request $request)
    {
        $page = 'home';

        $textFields = [
            'seo_description_fr',
            'seo_keywords_fr',
            'seo_description_en',
            'seo_keywords_en',
            'banner_content_fr',
            'banner_content_en',
            'about_year',
            'concept_title_fr',
            'concept_text_fr',
            'concept_title_en',
            'concept_text_en',
            'mcn_title_fr',
            'mcn_text_fr',
            'mcn_link_fr',
            'mcn_title_en',
            'mcn_text_en',
            'mcn_link_en',
            'edition_title_fr',
            'edition_city',
            'edition_text_fr',
            'edition_explore_fr',
            'edition_title_en',
            'edition_text_en',
            'edition_explore_en',
            'reservation_address',
            'reservation_concierge_label_fr',
            'reservation_concierge_email',
            'reservation_concierge_phone',
            'reservation_concierge_label_en',
            'participation_title_fr',
            'non_national_price',
            'discover_offers_fr',
            'participation_title_en',
            'discover_offers_en',
            'social_instagram',
            'social_linkedin',
            'social_twitter',
            'package_title_fr',
            'package_details_fr',
            'package_title_en',
            'package_details_en',
        ];

        foreach ($textFields as $key) {
            if ($request->has($key)) {
                ConfigApp::updateOrCreate(
                    ['key' => $key, 'page' => $page],
                    ['value' => $request->input($key) ?? '', 'type' => 'string']
                );
            }
        }

        $imageFields = [
            'banner_image',
            'middle_image',
            'bottom_image',
            'bottom_image_en',
            'about_image',
            'about_image_en',
            'fondation_img1',
            'fondation_img2',
            'fondation_img3',
            'fondation_img1_en',
            'fondation_img2_en',
            'fondation_img3_en',
            'edition_image',
        ];

        foreach ($imageFields as $key) {
            if ($request->hasFile($key)) {
                $path = $request->file($key)->store("pages/{$page}", 'public');
                ConfigApp::updateOrCreate(
                    ['key' => $key, 'page' => $page],
                    ['value' => Storage::url($path), 'type' => 'image']
                );
            }
        }

        foreach (['fr', 'en'] as $lang) {
            $itemsKey = "package_items_{$lang}";
            if ($request->has($itemsKey)) {
                $items = array_values(
                    array_filter($request->input($itemsKey, []), fn($v) => trim($v) !== '')
                );
                ConfigApp::updateOrCreate(
                    ['key' => $itemsKey, 'page' => $page],
                    ['value' => json_encode($items), 'type' => 'json']
                );
            }
        }

        return response()->json(['success' => true, 'message' => 'Sauvegardé avec succès.']);
    }
}
