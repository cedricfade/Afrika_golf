<?php

namespace App\Exports;

use App\Models\Invite;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class InvitesExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithTitle
{
    public function collection()
    {
        return Invite::where('deleted', false)->orderByDesc('created_at')->get();
    }

    public function headings(): array
    {
        return [
            'Groupe ID',
            'Type',
            'Civilité',
            'Nom',
            'Prénom',
            'Date naissance',
            'Adresse',
            'Pays',
            'Ville',
            'Code postal',
            'Téléphone',
            'Email',
            'Index golf',
            'N° licence',
            'Taille polo',
            'Session',
            'Page',
            'Date inscription',
        ];
    }

    public function map($row): array
    {
        return [
            $row->groupe_id,
            $row->type,
            $row->civilite,
            $row->nom,
            $row->prenom,
            $row->date_naissance,
            $row->adresse,
            $row->pays,
            $row->ville,
            $row->code_postal,
            $row->telephone,
            $row->email,
            $row->index_golf,
            $row->numero_licence,
            $row->taille_polo,
            $row->session,
            $row->page,
            $row->created_at ? Carbon::createFromTimestamp($row->created_at)->format('d/m/Y H:i') : '—',
        ];
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    public function title(): string
    {
        return 'Inscriptions Tournoi';
    }
}
