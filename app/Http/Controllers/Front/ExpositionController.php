<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImageSlide;

class ExpositionController extends Controller
{
    public function index()
    {
        return view('front.exposition', [
            'galleryImages'     => ImageSlide::where('page', 'destination')->where('deleted', false)->orderBy('ranking')->get(),
        ]);
    }
}
