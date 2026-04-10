<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\CommandBall;
use App\Models\WebInvitation;

class SettingController extends Controller
{
    public function index()
    {
        return view('back.setting');
    }

    public function ajaxWebInvitations()
    {
        return response()->json([
            'data' => WebInvitation::where('deleted', false)->orderByDesc('created_at')->get()->map(function ($invitation) {
                $date = $invitation->created_at ? date('d/m/Y H:i', $invitation->created_at) : '—';
                $btn = '<button type="button"'
                    . ' class="btn btn-sm btn-outline-dark btn-voir"'
                    . ' data-bs-toggle="modal"'
                    . ' data-bs-target="#modalInvitation"'
                    . ' data-id="' . $invitation->id . '"'
                    . ' data-nom="' . e($invitation->nomComplet) . '"'
                    . ' data-email="' . e($invitation->email) . '"'
                    . ' data-objet="' . e($invitation->objet) . '"'
                    . ' data-page="' . e($invitation->page) . '"'
                    . ' data-message="' . e($invitation->message) . '"'
                    . ' data-date="' . $date . '">'
                    . '<i class="fe fe-eye"></i>'
                    . '</button>';
                return [
                    $invitation->id,
                    e($invitation->nomComplet),
                    e($invitation->email),
                    e($invitation->objet),
                    e($invitation->page),
                    $date,
                    $btn,
                ];
            }),
        ]);
    }

    public function ajaxCommandBalls()
    {
        return response()->json([
            'data' => CommandBall::where('deleted', false)->orderByDesc('created_at')->get()->map(function ($command) {
                $date = $command->created_at ? date('d/m/Y H:i', $command->created_at) : '—';
                $btn = '<button type="button"'
                    . ' class="btn btn-sm btn-outline-dark btn-voir"'
                    . ' data-bs-toggle="modal"'
                    . ' data-bs-target="#modalCommandBall"'
                    . ' data-id="' . $command->id . '"'
                    . ' data-nom="' . e($command->nom) . '"'
                    . ' data-prenom="' . e($command->prenom) . '"'
                    . ' data-telephone="' . e($command->telephone) . '"'
                    . ' data-email="' . e($command->email) . '"'
                    . ' data-balles="' . $command->nombre_de_balles . '"'
                    . ' data-date="' . $date . '">'
                    . '<i class="fe fe-eye"></i>'
                    . '</button>';
                return [
                    $command->id,
                    e($command->nom),
                    e($command->prenom),
                    e($command->telephone),
                    e($command->email),
                    $command->nombre_de_balles,
                    $date,
                    $btn,
                ];
            }),
        ]);
    }
}
