<?php

namespace App\Http\Controllers\Back\Slides;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Models\ImageSlide;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GalerieController extends Controller
{
    use HttpResponses;

    public function index(string $page = 'galerie')
    {
        return view('back.galerie', [
            'images' => ImageSlide::where('page', $page)->where('deleted', false)->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
            'page' => 'required|string',
        ]);

        $path = $request->file('image')->store("slides/galeries", 'public');

        ImageSlide::create([
            'page' => $request->page ?? 'galerie',
            'content' => $path,
            'ranking' => ImageSlide::where('page', $request->page ?? 'galerie')->max('ranking') + 1,
        ]);

        return $this->successResponse(__('Image ajoutée avec succès.'));
    }

    public function destroy(Request $request)
    {
        $imageSlide = ImageSlide::find($request->id);
        if (!$imageSlide) {
            return $this->errorResponse(__('Image not found.'), [], 404);
        }

        // Supprimer le fichier physique du disque public
        if ($imageSlide->content && Storage::disk('public')->exists($imageSlide->content)) {
            Storage::disk('public')->delete($imageSlide->content);
        }

        $imageSlide->update([
            'deleted' => true,
            'deleted_at' => time(),
            'deleted_by' => Auth::user()->id,
        ]);

        return $this->successResponse(__('Image supprimée avec succès.'));
    }
}
