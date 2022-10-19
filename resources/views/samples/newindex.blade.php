@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<div class="PageMargin">
    <div class="PageBlank">
        <div class="Page">
            <h1>サンプル一覧</h1>
            <div class='TopDiv'>
                <a href="/samples" class="BtnGreen TagBtn">人気順</a>
                <a class="BtnGreen2 TagBtn">新着順</a>
            </div>
            <div class='TopDiv'>
                <div class='TopDiv'>
                    @foreach ($samples as $sample)
                        <div class='RankBox'>
                            <div class='RankImgBox'>
                                <a href="/samples/{{$sample->id}}"><img src="{{ $sample->image_path }}" width="320" height="180"></a>
                            </div>
                        </div>
                    @endforeach
                </div>
                {!! $samples->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection