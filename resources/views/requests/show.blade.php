@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<div class="PageMargin">
    <div class="PageBlank">
        <div class="Page">
            <h1 class="title">
                {{ $req->title }}
            </h1>
            <div class="MiniNameBox">
                <a class="MiniNameA" href="/users/{{$req->user->id}}">
                    <div class="MiniIconBox">
                        @empty($req->user->image_path)
                        <img class="MiniIcon" src="{{ asset('images/default_icon.png') }}">
                        @else
                        <img class="MiniIcon" src="{{$req->user->image_path}}">
                        @endempty
                    </div>
                    <div class="MiniName">{{ $req->user->name }}</div>
                </a>
            </div>
            
            <h3>依頼費用の目安</h3>
            <p>{{ $req->price }}円(あくまで目安です)</p>
            <h3>募集締切</h3>  
            <p>{{ $req->deadline->format('n月j日') }}</p>
            <h3>詳細</h3>
            <p>{{ $req->detail }}</p>
            <h3>現在応募中</h3>
            <p>{{$req->offers()->count()}}人</p>
            @auth
                @if($req->user->id == Auth::user()->id)
                    <div class='PageBottom'>
                        @foreach ($offers as $offer)
                            <div class="MiniNameBox">
                                <a class="MiniNameA" href="/users/{{$offer->user->id}}">
                                    <div class="MiniIconBox">
                                        @empty($offer->user->image_path)
                                        <img class="MiniIcon" src="{{ asset('images/default_icon.png') }}">
                                        @else
                                        <img class="MiniIcon" src="{{$offer->user->image_path}}">
                                        @endempty
                                    </div>
                                    <div class="MiniName">{{ $offer->user->name }}</div>
                                </a>
                            </div>
                            <p>{{ $offer->detail }}</p>
                        @endforeach
                    </div>
                @else
                    <button class="BtnGreen Unhide2" onclick="unhide(1);hide(2);">応募フォームを開く</button>
                    <div class='Hide1 PageBottom'>
                        <form action="/requests/offer" method="post" enctype="multipart/form-data">
                            <h2>応募フォーム</h2>
                            <div class="form-group mb-2">
                                <textarea name="offer[detail]" placeholder="ひとこと"></textarea>
                            </div>
                            <input type="hidden" name="offer[req_id]" value="{{$req->id}}">
                            @csrf
                            <div class="form-group mb-0">
                                <button type="submit" class="BtnGreen">応募する</button>
                            </div>
                        </form>
                    </div>
                @endif
            @endauth
            <div class='PageBottom'>
                <a href="/requests" class="GrayA ">一覧へ</a>
            </div>
        </div>
    </div>
</div>
@endsection