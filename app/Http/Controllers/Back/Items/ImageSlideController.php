<?php

namespace App\Http\Controllers\Back\Items;

use App\Http\Controllers\Controller;
use App\Models\ImageSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageSlideController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'page'  => 'required|string',
        ]);

        $page    = $request->input('page');
        $path    = $request->file('image')->store("slides/{$page}", 'public');
        $ranking = (ImageSlide::where('page', $page)->where('deleted', false)->max('ranking') ?? 0) + 1;

        ImageSlide::create([
            'content'    => $path,
            'page'       => $page,
            'ranking'    => $ranking,
            'created_at' => time(),
            'created_by' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Image ajoutée à la galerie.');
    }

    public function destroy(ImageSlide $imageSlide)
    {
        if ($imageSlide->content && Storage::disk('public')->exists($imageSlide->content)) {
            Storage::disk('public')->delete($imageSlide->content);
        }

        $imageSlide->update([
            'deleted'    => true,
            'deleted_at' => time(),
            'deleted_by' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Image supprimée de la galerie.');
    }
}
