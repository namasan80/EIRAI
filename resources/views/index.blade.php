@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<div class="PageMargin">
    <div class="PageBlank">
        <div class="Page">
            <div class='TopBox'>
                <h2 class='TopTitle'>サムネ人気ランキング</h2>
                <div class='TopDiv'>
                    @foreach ($samples as $key => $sample)
                        <div class='RankBox'>
                            <a href="/samples/{{$sample->id}}">
                                <div class='RankImgBox'>
                                    <img src="{{ $sample->image_path }}" class="RankImg">
                                </div>
                                <div class='RankNumberBox'>
                                    <div class='RankNumber'>
                                        {{$key+1}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class='TopMore'>
                    <a href="/samples" class="GrayA">もっと見る</a>
                </div>
            </div>
            <div class='TopBox'>
                <h2 class='title'>新着リクエスト</h2>
                @foreach ($reqs as $req)
                    <div>
                        <a href="/reqs/{{$req->id}}">
                            <h2>{{$req->title}}</h2>
                        </a>
                    </div>
                    @endforeach
                <div class='TopMore'>
                    <a href="/requests">もっと見る</a>
                </div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
            </div>
        </div>
    </div>
</div>
@endsection