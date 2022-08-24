@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<div class="PageMargin">
    <div class="PageBlank">
        <div class="Page">
            <div class="SampleImg">
                <img src="{{ $sample->image_path }}">
            </div>
            
            <h1 class="title">
                {{ $sample->name }}
            </h1>
                <p>投稿者:<a href="/users/{{$sample->user->id}}">{{ $sample->user->name }}</a></p>
                
                @auth
                <button class="GoodButton{{$sample->id}}" onclick="good({{$sample->id}})">
                    @if(Auth::user()->isgood($sample->id))
                        いいね解除
                    @else
                        いいね
                    @endif
                </button>
                @else
                    ログインするといいねができます。
                @endauth
                <p>いいね数：{{ $sample->goods()->count()}}(←最終的に消す予定)</p>
                
                <h3>依頼費用の目安</h3>
                <p>{{ $sample->price }}円</p>
                <h3>制作時間</h3>  
                <p>{{ $sample->time }}時間</p>
                <h3>詳細</h3>
                <p>{{ $sample->detail }}</p>
            <div class="footer">
                <a href="/samples">一覧へ</a>
            </div>
        </div>
    </div>
    <div class="PageTest">
    </div>
</div>
@endsection