<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Req;
use App\Offer;

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
    
    public function offer(Request $request, Offer $offer, Req $req)
    {
        //過去に投稿しているのなら削除
        while(Req::where("id", $request['offer']['req_id'])->first()->offers()->where('user_id',$request->user()->id)->exists()){
            $deloffer = Req::where("id", $request['offer']['req_id'])->first()->offers()->where('user_id',$request->user()->id)->first();
            $deloffer->delete();
        }
        $input = $request['offer'];
        $input += ['user_id' => $request->user()->id];
        $offer->fill($input)->save();
        return redirect('/requests/' . $offer->req->id);
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
        return view('requests/show')->with([
            'req' => $req,
            'offers' => $req->offers()->orderBy('created_at', 'ASC')->get(),
        ]);
    }
}