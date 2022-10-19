@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<div class="PageMargin">
    <div class="PageBlank">
        <div class="Page">
            <div class="ProfileBox">
                @empty($user->image_path)
                    <img class="Icon" src="{{ asset('images/default_icon.png') }}" class="RankImg">
                @else
                    <img class="Icon" src="{{$user->image_path}}" class="RankImg">
                @endempty
                <h1 class="ProfileName" >{{ $user->name }}</h1>
            </div>
            <h3  style="display:inline;">プロフィール</h3>
            @auth
                @if(Auth::user()->id == $user->id)
                    <a href="/users/edit" class="GrayA">編集</a>
                @endif
            @endauth
            @auth
                @if(Auth::user()->id != $user->id)
                
                    <div class="content">
                        <button class="FollowButton{{$user->id}}" onclick="follow({{$user->id}})">
                            @if(Auth::user()->isfollow($user->id))
                                フォロー解除
                            @else
                                フォロー
                            @endif
                        </button>
                    </div>
                @endif
            @endauth

            <p>フォロワー：<span class="FollowCount{{$user->id}}">{{$user->countfollower($user)}}</span>人</p>
            <p>{!! nl2br(e($user->profile)) !!}</p>
            @empty($user->profile)
                <p>(自己紹介が設定されていません)</p>
            @endempty
            @empty($user->skima_id)
            @else
                <p><a href='https://skima.jp/profile?id={{$user->skima_id}}' target="_blank">Skima</a></p>
            @endempty
            @empty($user->twitter_id)
            @else
                <p><a href='https://twitter.com/{{$user->twitter_id}}' target="_blank">Twitter</a></p>
            @endempty
            <div class='TopBox'>
                <h3>新着サンプル</h3>
                <div class='Tov'>
                    @auth
                        @if(Auth::user()->id == $user->id)
                            <p><a href="/samples/create">サンプルを投稿する</a></p>
                        @endif
                    @endauth
                </div>
                <div class='TopDiv'>
                    @foreach ($samples as $key => $sample)
                        <div class='RankBox'>
                                <a href="/samples/{{$sample->id}}">
                                    <div class='RankImgBox'>
                                        <img src="{{ $sample->image_path }}" class="RankImg">
                                    </div>
                                </a>
                        </div>
                    @endforeach
                </div>
                <div class='TopMore'>
                    <a class="GrayA" href="/samples">もっと見る</a>
                </div>
            </div>
            <div class='TopBox'>
                <h3>新着リクエスト</h3>
                <div class='TopMore'>
                    <a class="GrayA" href="/samples">もっと見る</a>
                    <p ><a href="/samples/create" class="BtnGreen">サンプルを投稿する</a></p>
                </div>
            </div>
            
            @auth
                @if(Auth::user()->id == $user->id)
                    <a class="GrayA" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        ログアウト
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endif
            @endauth
        </div>
    </div>
</div>
@endsection