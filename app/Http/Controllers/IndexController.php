<?php

namespace App\Http\Controllers;

use App\Sample;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Sample $sample)
    {
        return view('index')->with(['samples' => $sample->take(4)->get()]);
    }
}
