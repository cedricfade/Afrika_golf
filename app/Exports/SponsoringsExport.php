<?php

namespace App\Exports;

use App\Models\SponsoringRequest;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SponsoringsExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithTitle
{
    public function collection()
    {
        return SponsoringRequest::where('deleted', false)->orderByDesc('created_at')->get();
    }

    public function headings(): array
    {
        return ['#', 'Société', 'Nom & Prénoms', 'Pays', 'Email', 'Téléphone', 'Secteur', 'Pack', 'Date'];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->company_name,
            $row->nom_prenoms,
            $row->country,
            $row->email,
            $row->telephone ?? '—',
            $row->sector,
            $row->pack_title ?? '—',
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
        return 'Demandes de Sponsoring';
    }
}
