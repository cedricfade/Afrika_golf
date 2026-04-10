<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LogoPartner;

class PartenairesController extends Controller
{
    public function index()
    {
        return view('front.partenaires', [
            'partners'     => LogoPartner::where('deleted', false)->get(),
        ]);
    }
}
