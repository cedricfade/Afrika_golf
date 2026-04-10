<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\ConfigApp;
use App\Models\LogoPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PartenairesController extends Controller
{
    public function index()
    {
        $page   = 'partenaires';
        $config = ConfigApp::where('page', $page)->pluck('value', 'key');

        return view('back.partenaires', [
            'bannerTitle'  => $config->get('banner_title', 'Partenaires'),
            'bannerImage'  => $config->get('banner_image')
                ? Storage::url($config->get('banner_image'))
                : asset('assets/images/partenaire/banner.png'),
            'sectionTitle' => $config->get('section_title', 'Partenaires distingués'),
            'sectionIntro' => $config->get('section_intro', ''),
            'partners'     => LogoPartner::where('deleted', false)->get(),
        ]);
    }

    public function store(Request $request)
    {
        $page = 'partenaires';

        $textFields = ['banner_title', 'section_title', 'section_intro'];
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
                ['value' => $path, 'type' => 'image']
            );
        }

        return redirect()->back()->with('success', 'Partenaires mis à jour avec succès.');
    }

    public function storeLogo(Request $request)
    {
        $request->validate([
            'logo_image'   => 'required|image|max:2048',
            'logo_libelle' => 'required|string|max:255',
        ]);

        $path = $request->file('logo_image')->store('partenaires/logos', 'public');

        LogoPartner::create([
            'image'      => $path,
            'libelle'    => $request->input('logo_libelle'),
            'created_at' => time(),
            'created_by' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Logo ajouté avec succès.');
    }

    public function destroyLogo(LogoPartner $logo)
    {
        if ($logo->image && Storage::disk('public')->exists($logo->image)) {
            Storage::disk('public')->delete($logo->image);
        }

        $logo->update([
            'deleted'    => true,
            'deleted_at' => time(),
            'deleted_by' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Logo supprimé avec succès.');
    }
}
