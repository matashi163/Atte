@extends('layouts.app')

@section('app_css')
<link rel="stylesheet" href="{{asset('css/attendance.css')}}">
@endsection

@section('content')
<div class="attendance__content">
    <div class="attendance__date">
        <a href="/attendance/{{$previousDate}}" class="date__button"><</a>
        <span class="date__text">{{$date}}</span>
        <a href="/attendance/{{$nextDate}}" class="date__button">></a>
    </div>
    <div class="attendance__list">
        <div class="list__content">
            <table class="list__table">
                <tr class="list__table--row">
                    <th class="list__table--header">名前</th>
                    <th class="list__table--header">勤務開始</th>
                    <th class="list__table--header">勤務終了</th>
                    <th class="list__table--header">休憩時間</th>
                    <th class="list__table--header">勤務時間</th>
                </tr>
                @foreach($workTimeDatas as $workTimeData)
                <tr class="list__table--row">
                    <td class="list__table--item">{{$workTimeData['user_name']}}</td>
                    <td class="list__table--item">{{$workTimeData['work_start']}}</td>
                    <td class="list__table--item">{{$workTimeData['work_finish']}}</td>
                    <td class="list__table--item">{{$workTimeData['break_total']}}</td>
                    <td class="list__table--item">{{$workTimeData['work_total']}}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="list__pagination">
            {{ $users->links('pagination') }}
        </div>
    </div>
</div>
@endsection