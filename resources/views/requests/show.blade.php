@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="title">
                {{ $req->title }}
            </h1>
            <div class="content">
                <div class="content__post"> 
                    依頼者:{{ $req->user->name }}
                    <h3>依頼費用の目安</h3>
                    <p>{{ $req->price }}円(あくまで目安です)</p>
                    <h3>募集締切</h3>  
                    <p>{{ $req->deadline->format('n月j日') }}</p>
                    <h3>詳細</h3>
                    <p>{{ $req->detail }}</p>
                </div>
            </div>
        <div class="footer">
            <a href="/requests">戻る</a>
        </div>
    </div>
</div>
@endsection