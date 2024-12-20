@extends('layouts.base')

@section('css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@yield('app_css')
@endsection

@section('header')
<a href="/" class="header__button">ホーム</a>
<a href="/attendance" class="header__button">日付一覧</a>
<form action="/logout" method="post" class="header__logout">
    @csrf
    <button class="header__button">ログアウト</button>
</form>
@endsection

@section('content')
@yield('content')
@endsection