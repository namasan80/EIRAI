@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<div class="PageMargin">
    <div class="PageBlank">
        <div class="Page">
            <h1 class="title">編集画面</h1>
                <form action="/users/{{ $user->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <h2>名前</h2>
                    <input type='text' name='user[name]' value="{{ $user->name }}">
                    <h2>プロフィール</h2>
                    <!--<input type='text' name='user[profile]' value="{{ $user->profile }}">-->
                    <textarea name='user[profile]'>{{ $user->profile }}</textarea><br>
                    <input type="submit" value="保存">
                </form>
        </div>
    </div>
</div>
@endsection