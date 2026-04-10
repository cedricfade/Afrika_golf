<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class VerifyRecaptcha
{
    /**
     * Minimum reCAPTCHA v3 score to accept (0.0 = bot, 1.0 = human)
     */
    private const MIN_SCORE = 0.5;

    public function handle(Request $request, Closure $next): Response
    {
        // Skip if reCAPTCHA is not configured (e.g. dev environment without keys)
        $secretKey = config('services.recaptcha.secret_key');
        if (empty($secretKey)) {
            return $next($request);
        }

        $token = $request->input('g-recaptcha-response');

        if (empty($token)) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['recaptcha' => 'Vérification anti-bot échouée. Veuillez réessayer.']);
        }

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => $secretKey,
            'response' => $token,
            'remoteip' => $request->ip(),
        ]);

        if (! $response->successful()) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['recaptcha' => 'Erreur lors de la vérification anti-bot. Veuillez réessayer.']);
        }

        $result = $response->json();

        if (empty($result['success']) || ($result['score'] ?? 0) < self::MIN_SCORE) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['recaptcha' => 'Score anti-bot insuffisant. Veuillez réessayer.']);
        }

        return $next($request);
    }
}
