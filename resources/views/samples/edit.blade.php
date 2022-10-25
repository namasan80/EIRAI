@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<div class="PageMargin">
    <div class="PageBlank">
        <div class="Page">
            <h1 class="title">ポートフォリオ編集</h1>
            <div class='RankImgBox'>
                <img src="{{ $sample->image_path }}" width="320" height="180">
            </div>
            <form action="/samples/{{ $sample->id }}" method="POST">
                @csrf
                @method('PUT')
                <h2>タイトル</h2>
                <input type="text" name="sample[name]" value="{{ $sample->name }}" placeholder="タイトル"/>
                <p class="ErrorP">{{$errors->first('sample.name')}}</p>
                <h2>詳細</h2>
                <textarea name="sample[detail]" placeholder="詳細(制作期間等)">{{ $sample->detail }}</textarea>
                <p class="ErrorP">{{$errors->first('sample.detail')}}</p>
                <h2>依頼費用の目安</h2>
                <input type="number" name="sample[price]" value="{{ $sample->price }}" placeholder="費用目安"/>円
                <p class="ErrorP">{{$errors->first('sample.price')}}</p>
                <h2>制作時間</h2>
                <input type="number" name="sample[time]"  value="{{ $sample->time }}" placeholder="制作時間"/>時間
                <p class="ErrorP">{{$errors->first('sample.time')}}</p>
                <input type="submit" value="保存"/>
            </form>
        </div>
    </div>
</div>
@endsection