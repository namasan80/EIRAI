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
            <div class="MiniNameBox">
                <a class="MiniNameA" href="/users/{{$sample->user->id}}">
                    <div class="MiniIconBox">
                        @empty($sample->user->image_path)
                        <img class="MiniIcon" src="{{ asset('images/default_icon.png') }}">
                        @else
                        <img class="MiniIcon" src="{{$sample->user->image_path}}">
                        @endempty
                    </div>
                    <div class="MiniName">{{ $sample->user->name }}</div>
                </a>
            </div>
                
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
                <p>いいね数：<span class="GoodCount{{$sample->id}}">{{ $sample->goods()->count()}}</span></p>
                
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
</div>
@endsection