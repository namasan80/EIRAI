<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class GoodController extends Controller
{
    public function store($sampleId)
    {
        Auth::user()->good($sampleId);
    }
}