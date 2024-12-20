@extends('layouts.auth')

@section('title')
会員登録
@endsection

@section('form')
<form action="/register" method="post">
    @csrf
    <div class="auth__group">
        <input type="text" name="name" value="{{old('name')}}" placeholder="名前" class="auth__input">
        <p class="auth__error">
            @error('name')
            {{$errors->first('name')}}
            @enderror
        </p>
    </div>
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
    <div class="auth__group">
        <input type="password" name="password_confirmation" placeholder="確認用パスワード" class="auth__input">
        <p class="auth__error"></p>
    </div>
    <button class="auth__button">会員登録</button>
</form>
@endsection

@section('transition_text')
アカウントをお持ちの方はこちらから
@endsection

@section('transition_link')
/login
@endsection

@section('transition_link_text')
ログイン
@endsection