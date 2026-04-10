<?php

namespace App\Http\Controllers\Front\Form;

use App\Events\InvitationSubmitted;
use App\Http\Controllers\Controller;
use App\Models\WebInvitation;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;

class ReservationController extends Controller
{
    use HttpResponses;

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomComplet' => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'objet'      => 'required|string|max:255',
            'message'    => 'required|string',
            'page'       => 'nullable|string|max:255',
        ]);

        $invitation = WebInvitation::create([
            'nomComplet' => $validated['nomComplet'],
            'email'      => $validated['email'],
            'objet'      => $validated['objet'],
            'message'    => $validated['message'],
            'page'       => $validated['page'] ?? request()->url(),
        ]);

        InvitationSubmitted::dispatch($invitation);

        return $this->successResponse(__('Votre demande d\'invitation a été envoyée avec succès. Un email de confirmation vous a été adressé.'));
    }
}
