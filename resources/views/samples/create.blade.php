@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="title">ポートフォリオ投稿</h1>
            <div class="content">
                <form action="/samples" method="POST">
                    @csrf
                    <div class="title">
                        <h2>タイトル</h2>
                        <input type="text" name="sample[name]" placeholder="タイトル"/>
                    </div>
                    <div class="body">
                        <h2>詳細</h2>
                        <textarea name="sample[detail]" placeholder="詳細(制作期間等)"></textarea>
                        <h2>依頼費用の目安</h2>
                        <input type="number" name="sample[price]" placeholder="費用目安"/>円
                        <h2>制作時間</h2>
                        <input type="number" name="sample[time]" placeholder="制作時間"/>時間
                    </div>
                    <input type="submit" value="保存"/>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection