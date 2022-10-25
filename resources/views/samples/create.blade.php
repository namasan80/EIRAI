@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<div class="PageMargin">
    <div class="PageBlank">
        <div class="Page">
            <h1 class="title">ポートフォリオ投稿</h1>
            <div class="content">
                <form action="/samples" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="title">
                        <input type="file" name="image">
                        <p class="ErrorP">{{$errors->first('image')}}</p>
                        <h2>タイトル</h2>
                        <input type="text" name="sample[name]" placeholder="タイトル"/>
                        <p class="ErrorP">{{$errors->first('sample.name')}}</p>
                    </div>
                    <div class="body">
                        <h2>詳細</h2>
                        <textarea name="sample[detail]" placeholder="詳細(制作期間等)"></textarea>
                        <p class="ErrorP">{{$errors->first('sample.detail')}}</p>
                        <h2>依頼費用の目安</h2>
                        <input type="number" name="sample[price]" placeholder="費用目安"/>円
                        <p class="ErrorP">{{$errors->first('sample.price')}}</p>
                        <h2>制作時間</h2>
                        <input type="number" name="sample[time]" placeholder="制作時間"/>時間
                        <p class="ErrorP">{{$errors->first('sample.time')}}</p>
                    </div>
                    <input type="submit" value="保存"/>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection