<?php

namespace App\Http\Controllers\Front\Form;

use App\Events\InviteGroupSubmitted;
use App\Http\Controllers\Controller;
use App\Models\Invite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Traits\HttpResponses;

class ReservationController extends Controller
{
    use HttpResponses;

    public function store(Request $request)
    {
        // reCAPTCHA v3 validation
        $secretKey = config('services.recaptcha.secret_key');
        if (!empty($secretKey)) {
            $token = $request->input('g-recaptcha-response');
            if (empty($token)) {
                return $this->errorResponse('Vérification anti-bot échouée. Veuillez réessayer.', [], 422);
            }
            $recaptchaResp = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret'   => $secretKey,
                'response' => $token,
                'remoteip' => $request->ip(),
            ]);
            $result = $recaptchaResp->json();
            if (empty($result['success']) || ($result['score'] ?? 0) < 0.5) {
                return $this->errorResponse('Score anti-bot insuffisant. Veuillez réessayer.', [], 422);
            }
        }

        $request->validate([
            'participants'                   => 'required|array|min:1',
            'participants.*.type'            => 'required|in:Golfeur,Non golfeur',
            'participants.*.civilite'        => 'required|in:Madame,Mademoiselle,Monsieur',
            'participants.*.nom'             => 'required|string|max:255',
            'participants.*.prenom'          => 'nullable|string|max:255',
            'participants.*.date_naissance'  => 'nullable|date',
            'participants.*.adresse'         => 'nullable|string|max:500',
            'participants.*.pays'            => 'nullable|string|max:100',
            'participants.*.ville'           => 'nullable|string|max:100',
            'participants.*.code_postal'     => 'nullable|string|max:20',
            'participants.*.telephone'       => 'nullable|string|max:30',
            'participants.*.email'           => 'required|email|max:255',
            'participants.*.index_golf'      => 'nullable|string|max:10',
            'participants.*.numero_licence'  => 'nullable|string|max:50',
            'participants.*.taille_polo'     => 'nullable|in:S,M,L,XL,XXL,Autre',
            'participants.*.session'         => 'nullable|string|max:30',
            'page'                           => 'nullable|string|max:255',
        ]);

        $groupeId = Str::uuid()->toString();
        $page = $request->input('page', request()->url());

        $invites = [];
        foreach ($request->input('participants') as $p) {
            $invites[] = Invite::create([
                'groupe_id'      => $groupeId,
                'type'           => $p['type'],
                'civilite'       => $p['civilite'],
                'nom'            => $p['nom'],
                'prenom'         => $p['prenom'] ?? null,
                'date_naissance' => $p['date_naissance'] ?? null,
                'adresse'        => $p['adresse'] ?? null,
                'pays'           => $p['pays'] ?? null,
                'ville'          => $p['ville'] ?? null,
                'code_postal'    => $p['code_postal'] ?? null,
                'telephone'      => $p['telephone'] ?? null,
                'email'          => $p['email'],
                'index_golf'     => $p['index_golf'] ?? null,
                'numero_licence' => $p['numero_licence'] ?? null,
                'taille_polo'    => $p['taille_polo'] ?? null,
                'session'        => $p['session'] ?? null,
                'page'           => $page,
            ]);
        }

        InviteGroupSubmitted::dispatch($invites);

        return $this->successResponse(
            __('Votre inscription au tournoi a été envoyée avec succès. Un email de confirmation vous a été adressé.')
        );
    }
}
