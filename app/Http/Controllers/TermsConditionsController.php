<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermsConditionsController extends Controller
{
    public function index()
    {
        return view('pages.terms-condition');
    }
}
