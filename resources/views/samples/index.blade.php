@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class='body'><a href="/samples/create">サンプル投稿</a></p>
            <h1>サンプル一覧</h1>
            <div class='posts'>
                @foreach ($samples as $sample)
                    <div class='samplediv' >
                        <a href="/samples/{{$sample->id}}"><img src="{{ $sample->image_path }}" width="320" height="180"></a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection