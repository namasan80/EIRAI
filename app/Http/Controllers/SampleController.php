<?php

namespace App\Http\Controllers;

use App\Sample;
use Illuminate\Http\Request;
use Storage;

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
        $form = $request->all();
        
        $input = $request['sample'];
        $input += ['user_id' => $request->user()->id];
        $image = $request->file('image');
        // バケットの`myprefix`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
        // アップロードした画像のフルパスを取得
        $sample->image_path = Storage::disk('s3')->url($path);

        $sample->fill($input)->save();
        return redirect('/samples/' . $sample->id);
    }
    
    public function show(Sample $sample)
    {
        return view('samples/show')->with(['sample' => $sample]);
    }
}