<?php

namespace App\Http\Controllers\Front\Form;

use App\Events\SponsoringSubmitted;
use App\Http\Controllers\Controller;
use App\Models\Pack;
use App\Models\SponsoringRequest;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SponsoringController extends Controller
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

        $validated = $request->validate([
            'companyName' => 'required|string|max:255',
            'nomPrenoms'  => 'required|string|max:255',
            'country'     => 'required|string|max:100',
            'email'       => 'required|email|max:255',
            'sector'      => 'required|string|max:255',
            'telePhone'   => 'nullable|string|max:30',
            'packId'      => 'nullable|integer|exists:packs,id',
        ]);

        $pack = isset($validated['packId']) ? Pack::find($validated['packId']) : null;

        $sponsoring = SponsoringRequest::create([
            'company_name' => $validated['companyName'],
            'nom_prenoms'  => $validated['nomPrenoms'],
            'country'      => $validated['country'],
            'email'        => $validated['email'],
            'sector'       => $validated['sector'],
            'telephone'    => $validated['telePhone'] ?? null,
            'pack_id'      => $pack?->id,
            'pack_title'   => $pack?->title,
        ]);

        SponsoringSubmitted::dispatch($sponsoring);

        return $this->successResponse(__('Votre demande a bien été enregistrée. Un email de confirmation vous a été adressé.'));
    }
}
