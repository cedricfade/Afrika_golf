<?php

namespace App\Http\Controllers\Back\Items;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Models\LogoPartner;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PartenaireController extends Controller
{
    use HttpResponses;

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('partenaires', 'public');
            $data['image'] = asset('storage/' . $path);
        }

        if ($request->id) {
            $logoPartner = LogoPartner::find($request->id);
            if (!$logoPartner) {
                return $this->errorResponse(__('Partenaire not found.'), [], 404);
            }

            $logoPartner->update($data);

            return $this->successResponse(__('Partenaire :libelle a été mis à jour avec succès.', ['libelle' => $request->input('libelle')]));
        } else {

            LogoPartner::create($data);

            return $this->successResponse(__('Partenaire :libelle a été créé avec succès.', ['libelle' => $request->input('libelle')]));
        }
    }

    public function destroy(Request $request)
    {
        $logoPartner = LogoPartner::find($request->id);
        if (!$logoPartner) {
            return $this->errorResponse(__('Partenaire not found.'), [], 404);
        }

        // Supprimer le fichier physique du disque public
        if ($logoPartner->image && Storage::disk('public')->exists($logoPartner->image)) {
            Storage::disk('public')->delete($logoPartner->image);
        }

        $logoPartner->update([
            'deleted' => true,
            'deleted_at' => time(),
            'deleted_by' => Auth::user()->id,
        ]);

        return $this->successResponse(__('Partenaire supprimé avec succès.'));
    }
}
