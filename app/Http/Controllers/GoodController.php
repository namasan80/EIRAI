<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class GoodController extends Controller
{
    public function store($postId)
    {
        Auth::user()->like($postId);
    }

    public function destroy($postId)
    {
        Auth::user()->unlike($postId);
    }
}
