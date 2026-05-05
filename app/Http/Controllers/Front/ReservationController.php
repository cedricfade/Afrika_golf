<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ConfigApp;

class ReservationController extends Controller
{
    public function index()
    {
        return view('front.reservation');
    }

    public function ajaxContent()
    {
        $lang    = app()->getLocale();
        $configs = ConfigApp::where('page', 'reservation')->get()->keyBy('key');
        $get     = fn($k, $d = '') => $configs->get($k)?->value ?? $d;
        $getl    = fn($k, $d = '') => $configs->get("{$k}_{$lang}")?->value
                                   ?? $configs->get("{$k}_fr")?->value
                                   ?? $d;

        $defaultItems = [
            __('reservation.package_transport'),
            __('reservation.package_tournament'),
            __('reservation.package_dinner'),
            __('reservation.package_brunch'),
        ];

        $getItems = function (string $l) use ($configs, $defaultItems): array {
            $raw = $configs->get("package_items_{$l}")?->value;
            if ($raw) {
                $decoded = json_decode($raw, true);
                if (is_array($decoded) && count($decoded)) return $decoded;
            }
            return [];
        };

        $items = $getItems($lang) ?: $getItems('fr') ?: $defaultItems;

        return response()->json([
            'participation_title'   => $getl('participation_title',   __('reservation.participation_title')),
            'national_golfers'      => $getl('national_golfers',      __('reservation.national_golfers')),
            'national_price'        => $get('national_price',         '1400$'),
            'international_golfers' => $getl('international_golfers', __('reservation.international_golfers')),
            'international_price'   => $get('international_price',    '1750$'),
            'package_title'         => $getl('package_title',         __('reservation.package_title')),
            'package_items'         => $items,
            'contacts_title'        => $getl('contacts_title',        __('reservation.contacts_title')),
            'contact_email'         => $get('contact_email',          'cmangoua@mcn-cgp.com'),
            'contact_phone'         => $get('contact_phone',          '+225 07 87 05 03 15'),
        ]);
    }
}
