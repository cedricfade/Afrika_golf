<?php

namespace App\Http\Controllers\Back;

use App\Exports\CommandBallsExport;
use App\Exports\InvitationsExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function invitations()
    {
        $filename = 'invitations-web-' . now()->format('Y-m-d') . '.xlsx';

        return Excel::download(new InvitationsExport(), $filename);
    }

    public function commandBalls()
    {
        $filename = 'commandes-balles-' . now()->format('Y-m-d') . '.xlsx';

        return Excel::download(new CommandBallsExport(), $filename);
    }
}
