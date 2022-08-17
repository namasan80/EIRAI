<?php

namespace App\Http\Controllers;

use App\Sample;
use App\Req;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Sample $sample, Req $req)
    {
        return view('index')->with([
            'samples' => $sample->withCount('goods')->orderBy('goods_count', 'desc')->take(4)->get(),
            'reqs' => $req->orderBy('updated_at', 'desc')->take(4)->get(),
            ]);
    }
}