<?php

namespace App\Http\Controllers\Back\Items;

use App\Http\Controllers\Controller;
use App\Models\MediaSpace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MediasController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type'  => 'required|in:Sortie de presse,Kit media',
            'form'  => 'required|in:lien,fichier_externe',
            'file'  => 'required|file|mimes:pdf,doc,docx,zip,png,jpg,jpeg|max:10240',
        ]);

        $path = $request->form === 'fichier_externe' ? $request->file('file')->store('medias', 'public') : $request->file('file');

        MediaSpace::create([
            'title'      => $request->input('title'),
            'type'       => $request->input('type'),
            'form'       => $request->input('form'),
            'file'       => $path,
            'created_at' => time(),
            'created_by' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Fichier ajouté avec succès.');
    }

    public function destroy(MediaSpace $mediaSpace)
    {
        if ($mediaSpace->file && Storage::disk('public')->exists($mediaSpace->file)) {
            Storage::disk('public')->delete($mediaSpace->file);
        }

        $mediaSpace->update([
            'deleted'    => true,
            'deleted_at' => time(),
            'deleted_by' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Fichier supprimé avec succès.');
    }
}
