@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="title">編集画面</h1>
            <div class="content">
                <form action="/users/{{ $user->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <h2>名前</h2>
                    <input type='text' name='user[name]' value="{{ $user->name }}">
                    <h2>プロフィール</h2>
                    <textarea name='user[profile]'>{{ $user->profile }}</textarea><br>
                    <input type="submit" value="保存">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection