<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\ConfigApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function index()
    {
        $page   = 'contact';
        $config = ConfigApp::where('page', $page)->pluck('value', 'key');

        return view('back.contact', [
            'bannerTitle'  => $config->get('banner_title', 'Contactez-nous'),
            'bannerImage'  => $config->get('banner_image') ?? asset('assets/images/contact/banner.png'),
            'sectionLabel' => $config->get('section_label', 'ENTRER EN CONTACT'),
            'sectionTitle' => $config->get('section_title', 'Demander une Invitation'),
            'sectionText'  => $config->get('section_text', ''),
        ]);
    }

    public function store(Request $request)
    {
        $page = 'contact';

        $textFields = ['banner_title', 'section_label', 'section_title', 'section_text'];
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

        return redirect()->back()->with('success', 'Page Contact mise à jour avec succès.');
    }
}
