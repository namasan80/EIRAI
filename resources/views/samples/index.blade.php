@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<div class="PageMargin">
    <div class="PageBlank">
        <div class="Page">
            <h1>サンプル一覧</h1>
                @auth
                    <p><a href="/samples/create">サンプルを投稿する</a></p>
                @endauth
            <div class='TopDiv'>
                @if($search==null)
                    <a class="BtnGreen2 TagBtn">人気順</a>
                @else
                    <a href="/samples" class="BtnGreen TagBtn">人気順</a>
                @endif
                @if($search=="new")
                    <a class="BtnGreen2 TagBtn">新着順</a>
                @else
                    <a href="/samples?search=new" class="BtnGreen TagBtn">新着順</a>
                @endif
                @auth
                    @if($search=="follow")
                        <a class="BtnGreen2 TagBtn">フォロー中</a>
                    @else
                        <a href="/samples?search=follow" class="BtnGreen TagBtn">フォロー中</a>
                    @endif
                @endauth
            </div>
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
@endsection