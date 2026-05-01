<?php

namespace App\Http\Controllers\Front\Form;

use App\Events\WebInvitationSubmitted;
use App\Http\Controllers\Controller;
use App\Models\WebInvitation;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WebInvitationController extends Controller
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
            'nomComplet' => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'objet'      => 'required|string|max:255',
            'message'    => 'required|string|max:5000',
            'page'       => 'nullable|string|max:255',
        ]);

        $webInvitation = WebInvitation::create([
            'nomComplet' => $validated['nomComplet'],
            'email'      => $validated['email'],
            'objet'      => $validated['objet'],
            'message'    => $validated['message'],
            'page'       => $validated['page'] ?? $request->url(),
        ]);

        WebInvitationSubmitted::dispatch($webInvitation);

        return $this->successResponse(__('partials.message_sent_success'));
    }
}
