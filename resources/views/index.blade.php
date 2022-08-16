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
                    <p>もっと見る</p>
                </div>
            </div>
            <div class='TopBox'>
                <h2 class='title'>新着リクエスト</h2>
                <div class='TopDiv'>
                    (ここに新着リクエストが並ぶ)
                </div>
                <div class='TopMore'>
                    <p>もっと見る</p>
                </div>
            </div>
            <p class='body'><a href="/requests">リクエスト一覧</a></p>
            <p class='body'><a href="/samples">サンプル一覧</a></p>
        </div>
    </div>
</div>
@endsection