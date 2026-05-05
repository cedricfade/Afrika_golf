<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\ConfigApp;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $cfg = ConfigApp::where('page', 'reservation')
            ->get()->keyBy('key')->map(fn($c) => $c->value)->toArray();

        return view('back.reservations', [
            'state' => 'back',
            'cfg'   => $cfg,
        ]);
    }

    public function ajaxStore(Request $request)
    {
        $page = 'reservation';

        $fields = [
            'participation_title_fr',   'participation_title_en',
            'national_golfers_fr',      'national_golfers_en',
            'national_price',
            'international_golfers_fr', 'international_golfers_en',
            'international_price',
            'package_title_fr',         'package_title_en',
            'contacts_title_fr',        'contacts_title_en',
            'contact_email',
            'contact_phone',
        ];

        foreach ($fields as $key) {
            if ($request->has($key)) {
                ConfigApp::updateOrCreate(
                    ['key' => $key, 'page' => $page],
                    ['value' => $request->input($key) ?? '', 'type' => 'string']
                );
            }
        }

        return response()->json(['success' => true, 'message' => 'Sauvegardé avec succès.']);
    }

    public function addPackageItem(Request $request)
    {
        $lang  = in_array($request->input('lang'), ['fr', 'en']) ? $request->input('lang') : 'fr';
        $key   = "package_items_{$lang}";
        $text  = trim($request->input('item', ''));

        if ($text === '') {
            return response()->json(['success' => false, 'message' => 'Item vide.'], 422);
        }

        $config = ConfigApp::where('page', 'reservation')->where('key', $key)->first();
        $items  = $config ? json_decode($config->value, true) : [];
        $items  = is_array($items) ? $items : [];
        $items[] = $text;

        ConfigApp::updateOrCreate(
            ['key' => $key, 'page' => 'reservation'],
            ['value' => json_encode($items, JSON_UNESCAPED_UNICODE), 'type' => 'json']
        );

        return response()->json(['success' => true, 'items' => $items]);
    }

    public function deletePackageItem(Request $request, string $lang, int $index)
    {
        if (!in_array($lang, ['fr', 'en'])) {
            return response()->json(['success' => false], 422);
        }

        $key    = "package_items_{$lang}";
        $config = ConfigApp::where('page', 'reservation')->where('key', $key)->first();
        $items  = $config ? json_decode($config->value, true) : [];
        $items  = is_array($items) ? $items : [];

        array_splice($items, $index, 1);

        ConfigApp::updateOrCreate(
            ['key' => $key, 'page' => 'reservation'],
            ['value' => json_encode($items, JSON_UNESCAPED_UNICODE), 'type' => 'json']
        );

        return response()->json(['success' => true, 'items' => $items]);
    }
}
