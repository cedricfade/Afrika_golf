<?php

namespace App\Exports;

use App\Models\CommandBall;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CommandBallsExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithTitle
{
    public function collection()
    {
        return CommandBall::where('deleted', false)->orderByDesc('created_at')->get();
    }

    public function headings(): array
    {
        return ['#', 'Nom', 'Prénom', 'Téléphone', 'Email', 'Nombre de balles', 'Date'];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->nom,
            $row->prenom,
            $row->telephone,
            $row->email,
            $row->nombre_de_balles,
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
        return 'Commandes de Balles';
    }
}
