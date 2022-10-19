<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Req;

//日付計算用
use Carbon\Carbon;

class ReqController extends Controller
{
    public function index(Req $req)
    {
        return view('requests/index')->with(['reqs' => $req->get()]);
    }
    
    public function create()
    {
        return view('requests/create');
    }
    
    public function store(Request $request, Req $req)
    {
        $input = $request['req'];
        $input += ['user_id' => $request->user()->id];
        //現在の日程から締切日を計算
        $input += ['deadline' => Carbon::now()->addDay($request['deadline'])];
        $req->fill($input)->save();
        return redirect('/requests/' . $req->id);
    }
    
    public function show(Req $req)
    {
        return view('requests/show')->with(['req' => $req]);
    }
}
