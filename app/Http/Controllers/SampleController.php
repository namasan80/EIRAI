<?php

namespace App\Http\Controllers;

use App\Sample;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function index(Sample $sample)
    {
        return view('samples/index')->with(['samples' => $sample->get()]);
    }
    
    public function create()
    {
        return view('samples/create');
    }
    
    public function store(Request $request, Sample $sample)
    {
        $input = $request['sample'];
        $sample->fill($input)->save();
        return redirect('/samples/' . $sample->id);
    }
    
    public function show(Sample $sample)
    {
        return view('samples/show')->with(['sample' => $sample]);
    }
}