<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WorkTime;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function viewAttendance($date = null)
    {
        $users = User::with('workTimes.breakTimes')->paginate(5);
        $date = $date ?: Carbon::today()->format('Y-m-d');
        $previousDate = Carbon::createFromFormat('Y-m-d', $date)->subDay()->format('Y-m-d');
        $nextDate = Carbon::createFromFormat('Y-m-d', $date)->addDay()->format('Y-m-d');

        $workTimeDatas = [];
        foreach ($users as $user) {
            $userName = $user->name;
            $workTime = $user->workTimes()->whereDate('start_time', $date)->first();

            if (!$workTime || !$workTime->finish_time) {
                $workTimeDatas[] = [
                    'user_name' => $userName,
                    'work_start' => '--:--:--',
                    'work_finish' => '--:--:--',
                    'break_total' => '--:--:--',
                    'work_total' => '--:--:--',
                ];
            } else {
                $totalBreakTime = $workTime->breakTimes->reduce(function ($carry, $breakTime) {
                    $startBreakTime = Carbon::parse($breakTime->start_time);
                    $finishBreakTime = Carbon::parse($breakTime->finish_time);
                    $carry += $finishBreakTime->diffInSeconds($startBreakTime);

                    return $carry;
                }, 0);
                
                $totalBreakTimeHours = floor($totalBreakTime / 3600);
                $totalBreakTimeMinutes = floor(($totalBreakTime % 3600) / 60);
                $totalBreakTimeSeconds = $totalBreakTime % 60;

                $startWorkTime = Carbon::parse($workTime->start_time);
                $finishWorkTime = Carbon::parse($workTime->finish_time);

                $totalWorkTime = $finishWorkTime->diffInSeconds($startWorkTime) - $totalBreakTime;

                $totalWorkTimeHours = floor($totalWorkTime / 3600);
                $totalWorkTimeMinutes = floor(($totalWorkTime % 3600) / 60);
                $totalWorkTimeSeconds = $totalWorkTime % 60;

                $workTimeDatas[] = [
                    'user_name' => $userName,
                    'work_start' => $startWorkTime->format('H:i:s'),
                    'work_finish' => $finishWorkTime->format('H:i:s'),
                    'break_total' => sprintf('%02d:%02d:%02d', $totalBreakTimeHours, $totalBreakTimeMinutes, $totalBreakTimeSeconds),
                    'work_total' => sprintf('%02d:%02d:%02d', $totalWorkTimeHours, $totalWorkTimeMinutes, $totalWorkTimeSeconds),
                ];
            }
        }

        return view('attendance', compact('users', 'date', 'previousDate', 'nextDate', 'workTimeDatas'));
    }
}
