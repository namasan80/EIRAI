@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<div class="PageMargin">
    <div class="PageBlank">
        <div class="Page">
            <h1 class="title">プロフィール編集</h1>
            <form action="/users/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h2>アイコン</h2>
                <input type="file" name="image" class="form-group">
                {{ csrf_field() }}
                <h2>名前</h2>
                <input type='text' name='user[name]' value="{{ $user->name }}" class="form-group">
                <h2>プロフィール</h2>
                <textarea name='user[profile]' class="form-group">{{ $user->profile }}</textarea>
                <h2>SkimaID</h2>
                <input type='number' name='user[skima_id]' value="{{ $user->skima_id }}" class="form-group">
                <h2>TwitterID</h2>
                @<input type='text' name='user[twitter_id]' value="{{ $user->twitter_id }}" class="form-group"><br><br>
                <input type="submit" value="保存" class="BtnGreen">
            </form>
        </div>
    </div>
</div>
@endsection