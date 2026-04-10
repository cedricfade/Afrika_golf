<?php

namespace App\Http\Controllers\Front\Form;

use App\Events\CommandBallSubmitted;
use App\Http\Controllers\Controller;
use App\Models\CommandBall;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;

class CommandBallController extends Controller
{
    use HttpResponses;

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'phone'      => 'nullable|string|max:30',
            'email'      => 'required|email|max:255',
            'balls'      => 'required|integer|min:1',
        ]);

        $command = CommandBall::create($validated);

        CommandBallSubmitted::dispatch($command);

        return $this->successResponse(__('Votre commande de balles a bien été enregistrée. Un email de confirmation vous a été adressé.'));
    }
}
