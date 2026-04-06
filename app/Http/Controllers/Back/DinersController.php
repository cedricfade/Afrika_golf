<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DinersController extends Controller
{
    public function index()
    {
        return view('back.diners');
    }
}
