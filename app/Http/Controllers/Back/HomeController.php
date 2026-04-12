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
        return view('back.home', [
            'partners' => LogoPartner::where('deleted', false)->get(),
        ]);
    }

    public function store(Request $request)
    {
        $page = 'home';

        $textFields = [
            'banner_title',
            'banner_description',
            'banner_keywords',
            'about_title',
            'about_text',
            'about_year',
            'edition_title',
            'edition_city',
            'edition_text',
            'contact_title',
            'contact_text',
            'contact_email',
            'contact_phone',
        ];
        foreach ($textFields as $key) {
            if ($request->has($key)) {
                ConfigApp::updateOrCreate(
                    ['key' => $key, 'page' => $page],
                    ['value' => $request->input($key) ?? '', 'type' => 'string']
                );
            }
        }

        $imageFields = ['og_image', 'banner_image', 'middle_image', 'bottom_image', 'about_image', 'fondation_img1', 'fondation_img2', 'fondation_img3', 'edition_image'];
        foreach ($imageFields as $key) {
            if ($request->hasFile($key)) {
                $path = $request->file($key)->store("pages/{$page}", 'public');
                ConfigApp::updateOrCreate(
                    ['key' => $key, 'page' => $page],
                    ['value' => Storage::url($path), 'type' => 'image']
                );
            }
        }

        return redirect()->back()->with('success', "Page d'accueil mise à jour avec succès.");
    }
}
