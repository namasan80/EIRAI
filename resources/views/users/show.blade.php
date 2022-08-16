@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="title">{{ $user->name }}</h1>
            <div class="content">
                <div class="content__post">
                    <h3>プロフィール
                    
                        @auth
                            @if(Auth::user()->id == $user->id)
                                <a href="/users/edit">編集</a>
                            @endif
                        @endauth
                    </h3>
                    
                    @auth
                        @if(Auth::user()->id != $user->id)
                            <div class="content">
                                <form action="/users/{{$user->id}}/follow" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="submit" value="フォローする"/>
                                </form>
                                <form action="/users/{{$user->id}}/unfollow" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="submit" value="フォロー解除"/>
                                </form>
                            </div>
                        @endif
                    @endauth
                    
                    <p>フォロワー：{{$user->countfollower($user)}}人</p>
                    <p>{!! nl2br(e($user->profile)) !!}
                    @empty($user->profile)
                        (自己紹介が設定されていません)</p>
                    @endempty
                    <h3>サンプル一覧</h3>
                        @foreach ($samples as $sample)
                            <div class='body'>
                                <p>test</p>
                                <a href="/samples/{{$sample->id}}"><img src="{{ $sample->image_path }}" width="384" height="216"></a>
                            </div>
                        @endforeach
                    <h3>リクエスト一覧</h3>
                </div>
            </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </div>
</div>
@endsection