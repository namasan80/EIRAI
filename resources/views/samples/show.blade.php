@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="title">
                {{ $sample->name }}
            </h1>
            <div class="SampleImg">
                <img src="{{ $sample->image_path }}">
            </div>
            <div class="content__post"> 
                <p>作者:<a href="/users/{{$sample->user->id}}">{{ $sample->user->name }}</a></p>
                <button onclick="good({{$sample->id}})">いいね</button>
                <h3>依頼費用の目安</h3>
                <p>{{ $sample->price }}円(あくまで目安です)</p>
                <h3>制作時間</h3>  
                <p>{{ $sample->time }}時間</p>
                <h3>詳細</h3>
                <p>{{ $sample->detail }}</p>
            </div>
            <div class="footer">
                <a href="/samples">戻る</a>
            </div>
        </div>
    </div>
</div>
@endsection