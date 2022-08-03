@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="title">{{ $user->name }}</h1>
            <div class="content">
                <div class="content__post">
                    <h3>プロフィール
                    
                    @isset(Auth::user()->id)
                        @if(Auth::user()->id == $user->id)
                            <a href="/users/edit">編集</a>
                        @endif
                    @endisset
                    
                    </h3>
                    <p>{!! nl2br(e($user->profile)) !!}
                    @empty($user->profile)
                        (自己紹介が設定されていません)</p>
                    @endempty
                    <h3>サンプル一覧</h3>
                    <p>さんぷる</p>
                    <h3>リクエスト一覧</h3>
                    <p>りくえすと</p>
                </div>
            </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </div>
</div>
@endsection