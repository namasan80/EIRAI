<?php

namespace App\Http\Controllers;

use App\Sample;
use App\Http\Requests\SampleRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Storage;

class SampleController extends Controller
{
    public function index(Sample $sample, Request $request)
    {
        $search = $request->query('search');
        return view('samples/index')->with([
            'samples' => $sample->search($search),
            'search' => $search,
            ]);
    }
    
    public function create()
    {
        return view('samples/create');
    }
    
    public function store(SampleRequest $request, Sample $sample)
    {
        $input = $request['sample'];
        $input += ['user_id' => $request->user()->id];
        
        //画像をs3へアップロード、パスを取得
        $image = $request->file('image');
        $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
        $sample->image_path = Storage::disk('s3')->url($path);

        $sample->fill($input)->save();
        return redirect('/samples/' . $sample->id);
    }
    
    public function show(Sample $sample)
    {
        return view('samples/show')->with(['sample' => $sample]);
    }
}