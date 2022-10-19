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
            @auth
            <div class='TopBox'>
                <h2 class='TopTitle'>フォロー中の新着</h2>
                <div class='TopDiv'>
                    @empty($follows[0])
                        <p>お気に入りのユーザーをフォローしましょう</p>
                    @else
                        @foreach ($follows as $key => $follow)
                            <div class='RankBox'>
                                <a href="/samples/{{$follow->id}}">
                                    <div class='RankImgBox'>
                                        <img src="{{ $follow->image_path }}" class="RankImg">
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endempty
                </div>
                <div class='TopMore'>
                    @empty($follows[0])
                            <p><a href="/samples">サンプル一覧へ</a></p>
                    @else
                        <a href="/samples?search=follow" class="GrayA">もっと見る</a>
                    @endempty
                </div>
            </div>
            @endauth
            <div class='TopBox'>
                <h2 class='title'>新着リクエスト</h2>
                @foreach ($reqs as $req)
                    <div>
                        <a href="/requests/{{$req->id}}">
                            <h2>{{$req->title}}</h2>
                        </a>
                    </div>
                    @endforeach
                <div class='TopMore'>
                    <a href="/requests" class="GrayA">もっと見る</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection