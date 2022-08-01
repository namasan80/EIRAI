@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>ホーム画面</h1>
            <div class='posts'>
                <div class='post'>
                        <h2 class='title'>本日のサムネイル！</h2>
                    <p class='body'>(ここに3枚ぐらい、いいね数の多いサムネがランダムに並ぶ)</p>
                    <a href="/users/edit">編集</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection