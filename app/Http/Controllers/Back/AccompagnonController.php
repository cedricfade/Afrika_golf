<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\ConfigApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccompagnonController extends Controller
{
    public function index()
    {
        $cfg = ConfigApp::where('page', 'accompagnon')
            ->get()->keyBy('key')->map(fn($c) => $c->value)->toArray();

        return view('back.accompagnon', [
            'state' => 'back',
            'cfg'   => $cfg,
        ]);
    }

    public function ajaxStore(Request $request)
    {
        $page = 'accompagnon';

        $textFields = [
            'banner_title_fr',  'banner_title_en',
            'content_text_fr',  'content_text_en',
            'btn_programme_fr', 'btn_programme_en',
            'btn_reserve_fr',   'btn_reserve_en',
            'form_title_fr',    'form_title_en',
        ];

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
