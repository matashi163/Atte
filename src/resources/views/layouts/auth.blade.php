@extends('layouts.base')

@section('css')
<link rel="stylesheet" href="{{asset('css/auth.css')}}">
<link rel="stylesheet" href="{{asset('css/auth_form.css')}}">
@endsection

@section('content')
<div class="auth__content">
    <h2 class="auth__title">
        @yield('title')
    </h2>
    <div class="auth__form">
        @yield('form')
    </div>
    <div class="auth__transition">
        <p class="auth__transition--text">
            @yield('transition_text')
        </p>
        <a href="@yield('transition_link')" class="auth__transition--link">
            @yield('transition_link_text')
        </a>
    </div>
</div>
@endsection