@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class='TopBox'>
                <h2 class='title'>人気サムネランキング</h2>
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
                    <a href="/samples">もっと見る</a>
                </div>
            </div>
            <div class='TopBox'>
                <h2 class='title'>新着リクエスト</h2>
                <div class='TopDiv'>
                    (ここに新着リクエストが並ぶ)
                </div>
                <div class='TopMore'>
                    <a href="/requests">もっと見る</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection