@extends('layouts.app')

@section('app_css')
<link rel="stylesheet" href="{{asset('css/stamp.css')}}">
@endsection

@section('content')
<div class="stamp__content">
    <p class="stamp__text">
        @if(!$check && $status == 0)
        {{$name}}さんお疲れ様です！
        @elseif($status == 1)
        出勤中
        @elseif($status == 2)
        休憩中
        @elseif($check && $status == 0)
        お疲れさまでした！
        @endif
    </p>
    <div class="stamp__buttons">
        <div class="stamp__buttons--group">
            <a href="/work_start" class="stamp__button {{$check || $status != 0 ? 'stamp__button--inactive' : ''}}">勤務開始</a>
            <a href="/work_finish" class="stamp__button {{$status != 1 ? 'stamp__button--inactive' : ''}}">勤務終了</a>
        </div>
        <div class="stamp__buttons--group">
            <a href="/break_start" class="stamp__button {{$status != 1 ? 'stamp__button--inactive' : ''}}">休憩開始</a>
            <a href="/break_finish" class="stamp__button {{$status != 2 ? 'stamp__button--inactive' : ''}}">休憩終了</a>
        </div>
    </div>
</div>
@endsection