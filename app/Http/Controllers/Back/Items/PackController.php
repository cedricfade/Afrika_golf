<?php

namespace App\Http\Controllers\Back\Items;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pack;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PackController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'    => 'required|string|max:255',
            'symbole'  => 'required|string',
            'space'    => 'required|string|max:255',
            'price'    => 'required|numeric',
            'brochure' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        $path = $request->file('image')->store('packs', 'public');

        $brochurePath = null;
        if ($request->hasFile('brochure')) {
            $brochurePath = $request->file('brochure')->store('brochures', 'public');
        }

        Pack::create([
            'image'      => $path,
            'brochure'   => $brochurePath,
            'title'      => $request->input('title'),
            'symbole'    => $request->input('symbole'),
            'space'      => $request->input('space'),
            'price'      => $request->input('price'),
            'ranking'    => Pack::where('deleted', false)->max('ranking') + 1,
            'created_at' => time(),
            'created_by' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Pack créé avec succès.');
    }

    public function update(Request $request, Pack $pack)
    {
        $request->validate([
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'    => 'required|string|max:255',
            'symbole'  => 'required|string',
            'space'    => 'required|string|max:255',
            'price'    => 'required|numeric',
            'brochure' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        $data = [
            'title'   => $request->input('title'),
            'symbole' => $request->input('symbole'),
            'space'   => $request->input('space'),
            'price'   => $request->input('price'),
        ];

        if ($request->hasFile('image')) {
            if ($pack->image && Storage::disk('public')->exists($pack->image)) {
                Storage::disk('public')->delete($pack->image);
            }
            $data['image'] = $request->file('image')->store('packs', 'public');
        }

        if ($request->hasFile('brochure')) {
            if ($pack->brochure && Storage::disk('public')->exists($pack->brochure)) {
                Storage::disk('public')->delete($pack->brochure);
            }
            $data['brochure'] = $request->file('brochure')->store('brochures', 'public');
        }

        $pack->update($data);

        return redirect()->back()->with('success', 'Pack mis à jour avec succès.');
    }

    public function destroy(Pack $pack)
    {
        if ($pack->image && Storage::disk('public')->exists($pack->image)) {
            Storage::disk('public')->delete($pack->image);
        }

        if ($pack->brochure && Storage::disk('public')->exists($pack->brochure)) {
            Storage::disk('public')->delete($pack->brochure);
        }

        $pack->update([
            'deleted'    => true,
            'deleted_at' => time(),
            'deleted_by' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Pack supprimé avec succès.');
    }
}
