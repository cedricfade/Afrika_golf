<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\CommandBall;
use App\Models\Invite;
use App\Models\SponsoringRequest;
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

    public function ajaxInvites()
    {
        return response()->json([
            'data' => Invite::where('deleted', false)->orderByDesc('created_at')->get()->map(function ($invite) {
                $date = $invite->created_at ? date('d/m/Y H:i', $invite->created_at) : '—';
                $btn = '<button type="button"'
                    . ' class="btn btn-sm btn-outline-dark btn-voir"'
                    . ' data-bs-toggle="modal"'
                    . ' data-bs-target="#modalInvite"'
                    . ' data-id="' . $invite->id . '"'
                    . ' data-groupe="' . e($invite->groupe_id) . '"'
                    . ' data-type="' . e($invite->type) . '"'
                    . ' data-civilite="' . e($invite->civilite) . '"'
                    . ' data-nom="' . e($invite->prenom . ' ' . $invite->nom) . '"'
                    . ' data-email="' . e($invite->email) . '"'
                    . ' data-telephone="' . e($invite->telephone) . '"'
                    . ' data-polo="' . e($invite->taille_polo) . '"'
                    . ' data-session="' . e($invite->session) . '"'
                    . ' data-index="' . e($invite->index_golf) . '"'
                    . ' data-licence="' . e($invite->numero_licence) . '"'
                    . ' data-page="' . e($invite->page) . '"'
                    . ' data-date="' . $date . '">' .
                    '<i class="fe fe-eye"></i>'
                    . '</button>';
                return [
                    $invite->id,
                    substr($invite->groupe_id, 0, 8) . '…',
                    e($invite->type),
                    e($invite->civilite . ' ' . $invite->prenom . ' ' . $invite->nom),
                    e($invite->email),
                    e($invite->taille_polo ?? '—'),
                    e($invite->session ?: 'N/A'),
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

    public function ajaxSponsorings()
    {
        return response()->json([
            'data' => SponsoringRequest::where('deleted', false)->orderByDesc('created_at')->get()->map(function ($s) {
                $date = $s->created_at ? date('d/m/Y H:i', $s->created_at) : '—';
                $btn = '<button type="button"'
                    . ' class="btn btn-sm btn-outline-dark btn-voir"'
                    . ' data-bs-toggle="modal"'
                    . ' data-bs-target="#modalSponsoring"'
                    . ' data-id="' . $s->id . '"'
                    . ' data-company="' . e($s->company_name) . '"'
                    . ' data-nom="' . e($s->nom_prenoms) . '"'
                    . ' data-country="' . e($s->country) . '"'
                    . ' data-email="' . e($s->email) . '"'
                    . ' data-sector="' . e($s->sector) . '"'
                    . ' data-telephone="' . e($s->telephone) . '"'
                    . ' data-pack="' . e($s->pack_title ?? '—') . '"'
                    . ' data-date="' . $date . '">'
                    . '<i class="fe fe-eye"></i>'
                    . '</button>';
                return [
                    $s->id,
                    e($s->company_name),
                    e($s->nom_prenoms),
                    e($s->country),
                    e($s->email),
                    e($s->pack_title ?? '—'),
                    $date,
                    $btn,
                ];
            }),
        ]);
    }
}
