@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<div class="PageMargin">
    <div class="PageBlank">
        <div class="Page">
            
            <div class="LoginBox">
                <form method="POST" action="{{ route('login') }}" class="LoginForm">
                    @csrf

                    <div class="form-group col-md-0">
                        <label for="email" class="col-form-label text-md-right">{{ __('') }}</label>

                        <div class="">
                            <h2 class='TopTitle'>ログイン</h2>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="メールアドレス">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-form-label text-md-right">{{ __('') }}</label>

                        <div class="">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="パスワード">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('ログイン情報を記憶する') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <div class="">
                            <button type="submit" class="BtnGreen">
                                {{ __('ログイン') }}
                            </button>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <div class="">
                            @if (Route::has('password.request'))
                                <a class="GrayA" href="{{ route('password.request') }}">
                                    {{ __('パスワードを忘れた場合') }}
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="form-group mb-0">
                                <a class="BtnGreen" href="{{ url('/register') }}">
                                    {{ __('新規登録はこちら') }}
                                </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection