<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RdvController extends Controller
{
    public function index()
    {
        return view('back.rdv_aagc');
    }
}
