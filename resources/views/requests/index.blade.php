@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class='body'><a href="/requests/create">リクエスト投稿</a></p>
            <h1>リクエスト一覧</h1>
            <div class='posts'>
                @foreach ($reqs as $req)
                    <h2>
                        <a href="/requests/{{$req->id}}">{{ $req->title }}</a>
                    </h2>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection