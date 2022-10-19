<?php

namespace App\Http\Controllers;

use App\Sample;
use App\Req;
use Auth;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Sample $sample, Req $req)
    {
    if(Auth::user()!=null){
        $follows = Auth::user()->getFollowsPosts();
    }else{
        $follows = null;
    }
    return view('index')->with([
        'samples' => $sample->withCount('goods')->orderBy('goods_count', 'desc')->take(3)->get(),
        'follows' => $follows,
        'reqs' => $req->orderBy('updated_at', 'desc')->take(5)->get(),
        ]);
    }
}