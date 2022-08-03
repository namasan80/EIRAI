@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class='body'><a href="/samples/create">サンプル投稿</a></p>
            <h1>サンプル一覧</h1>
            <div class='posts'>
                @foreach ($samples as $sample)
                    <h2 class='title'><a href="/samples/{{$sample->id}}">{{$sample->name}}</a></h2>
                    <p class='body'>{{$sample->detail}}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection