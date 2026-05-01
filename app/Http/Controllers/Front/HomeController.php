<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LogoPartner;

class HomeController extends Controller
{
    public function Home()
    {
        return view('front.home', [
            'partners' => LogoPartner::where('deleted', false)->get(),
            'state' => 'front',
        ]);
    }
}
