<?php

namespace App\Http\Controllers\Back\Items;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cooker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class CookerController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            'nameLogo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $data = [
            'name'       => $request->input('name'),
            'content'    => $request->input('content'),
            'created_at' => time(),
            'created_by' => Auth::id(),
        ];

        $data['image'] = $request->file('image')->store('cookers', 'public');

        if ($request->hasFile('nameLogo')) {
            $data['nameLogo'] = $request->file('nameLogo')->store('cookers', 'public');
        }

        Cooker::create($data);

        return redirect()->back()->with('success', 'Chef ajouté avec succès.');
    }

    public function update(Request $request, Cooker $cooker)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            'nameLogo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $cooker->name    = $request->input('name');
        $cooker->content = $request->input('content');

        if ($request->hasFile('image')) {
            if ($cooker->image && Storage::disk('public')->exists($cooker->image)) {
                Storage::disk('public')->delete($cooker->image);
            }
            $cooker->image = $request->file('image')->store('cookers', 'public');
        }

        if ($request->hasFile('nameLogo')) {
            if ($cooker->nameLogo && Storage::disk('public')->exists($cooker->nameLogo)) {
                Storage::disk('public')->delete($cooker->nameLogo);
            }
            $cooker->nameLogo = $request->file('nameLogo')->store('cookers', 'public');
        }

        $cooker->save();

        return redirect()->back()->with('success', 'Chef mis à jour avec succès.');
    }

    public function destroy(Cooker $cooker)
    {
        if ($cooker->image && Storage::disk('public')->exists($cooker->image)) {
            Storage::disk('public')->delete($cooker->image);
        }
        if ($cooker->nameLogo && Storage::disk('public')->exists($cooker->nameLogo)) {
            Storage::disk('public')->delete($cooker->nameLogo);
        }

        $cooker->update([
            'deleted'    => true,
            'deleted_at' => time(),
            'deleted_by' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Chef supprimé avec succès.');
    }
}
