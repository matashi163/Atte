@extends('layouts.auth')

@section('title')
ログイン
@endsection

@section('form')
<form action="/login" method="post">
    @csrf
    <div class="auth__group">
        <input type="text" name="email" value="{{old('email')}}" placeholder="メールアドレス" class="auth__input">
        <p class="auth__error">
            @error('email')
            {{$errors->first('email')}}
            @enderror
        </p>
    </div>
    <div class="auth__group">
        <input type="password" name="password" placeholder="パスワード" class="auth__input">
        <p class="auth__error">
            @error('password')
            {{$errors->first('password')}}
            @enderror
        </p>
    </div>
    <button class="auth__button">ログイン</button>
</form>
@endsection

@section('transition_text')
アカウントをお持ちでない方はこちらから
@endsection

@section('transition_link')
/register
@endsection

@section('transition_link_text')
会員登録
@endsection