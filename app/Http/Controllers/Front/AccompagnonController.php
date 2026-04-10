<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccompagnonController extends Controller
{
    public $page = 'accompagnon';

    public function index()
    {
        return view('front.accompagnon');
    }

    public function ajaxContent()
    {
        return view('pageContent.ajaxContent.accompagnon.content');
    }

    public function ajaxFormPage()
    {
        return view('pageContent.ajaxContent.accompagnon.formPage');
    }
}
