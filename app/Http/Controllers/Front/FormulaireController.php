<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Pack;
use Illuminate\Support\Facades\Storage;

class FormulaireController extends Controller
{
    public function index()
    {
        return view('front.formulaire');
    }

    public function show(Pack $pack)
    {
        return view('front.formulaire', compact('pack'));
    }
}
