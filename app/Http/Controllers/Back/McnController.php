<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\ConfigApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class McnController extends Controller
{
    public function index()
    {
        $cfg = ConfigApp::where('page', 'mcn')
            ->get()->keyBy('key')->map(fn($c) => $c->value)->toArray();

        return view('back.mcn', [
            'state' => 'back',
            'cfg'   => $cfg,
        ]);
    }

    public function ajaxStore(Request $request)
    {
        $page = 'mcn';

        $textFields = [
            'intro_text_fr',    'intro_text_en',
            'service1_title_fr','service1_text_fr',
            'service1_title_en','service1_text_en',
            'service2_title_fr','service2_text_fr',
            'service2_title_en','service2_text_en',
        ];

        foreach ($textFields as $key) {
            if ($request->has($key)) {
                ConfigApp::updateOrCreate(
                    ['key' => $key, 'page' => $page],
                    ['value' => $request->input($key) ?? '', 'type' => 'string']
                );
            }
        }

        $imageFields = ['banner_image', 'right_image', 'right_bottom_image', 'right_bottom_image_en'];
        foreach ($imageFields as $key) {
            if ($request->hasFile($key)) {
                $path = $request->file($key)->store("pages/{$page}", 'public');
                ConfigApp::updateOrCreate(
                    ['key' => $key, 'page' => $page],
                    ['value' => Storage::url($path), 'type' => 'image']
                );
            }
        }

        return response()->json(['success' => true, 'message' => 'Sauvegardé avec succès.']);
    }
}
