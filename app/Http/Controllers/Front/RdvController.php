<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RdvController extends Controller
{
    public function index()
    {
        return view('front.rdv_aagc');
    }
}
