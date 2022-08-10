@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="title">リクエスト</h1>
            <div class="content">
                <form action="/requests" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="title">
                        <h2>タイトル</h2>
                        <input type="text" name="req[title]" placeholder="タイトル"/>
                    </div>
                    <div class="body">
                        <h2>詳細</h2>
                        <textarea name="req[detail]" placeholder="依頼の詳細"></textarea>
                        <h2>楽曲へのURL</h2>
                        <input name="req[musicurl]" placeholder="(空欄可)"/>
                        <h2>金額の目安</h2>
                        <input type="number" name="req[price]" placeholder="費用目安"/>円
                        <h2>募集締切</h2>
                        <input type="number" name="deadline" value="0"/>日後
                    <input type="submit" value="保存"/>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection