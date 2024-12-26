<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Status;
use App\Models\WorkTime;
use App\Models\BreakTime;

class StampController extends Controller
{
    public function viewStamp()
    {
        $status = User::find(auth()->id())->statuses()->first()->status;
        $check = WorkTime::where('user_id', auth()->id())->whereDate('start_time', Carbon::today())->exists();
        $name = User::find(auth()->id())->name;
        
        return view('stamp', compact('status', 'check', 'name'));
    }

    public function workStart()
    {
        WorkTime::create([
            'user_id' => auth()->id(),
            'start_time' => Carbon::now(),
        ]);

        Status::where('user_id', auth()->id())->first()->update([
            'status' => '1'
        ]);

        return redirect('/');
    }

    public function workFinish()
    {
        $id = auth()->id();
        $now = Carbon::now();
        $nowDate = $now->format('Y-m-d');
        $workTime = WorkTime::where('user_id', $id)->orderBy('created_at', 'desc')->first();
        $startTime = Carbon::parse($workTime->start_time);
        $workDate = $startTime->format('Y-m-d');

        while ($workDate < $nowDate) {
            $dayEndTime = $startTime->copy()->setTime(23, 59, 59);
            $workTime->update([
                'finish_time' => $dayEndTime
            ]);

            $startTime = $startTime->addDay()->setTime(0, 0, 0);
            $workDate = $startTime->format('Y-m-d');
            $workTime = WorkTime::create([
                'user_id' => $id,
                'start_time' => $startTime,
            ]);
        }

        $workTime->update([
            'finish_time' => $now
        ]);

        Status::where('user_id', $id)->first()->update([
            'status' => '0'
        ]);

        return redirect('/');
    }

    public function breakStart()
    {
        $userId = auth()->id();

        BreakTime::create([
            'work_time_id' => WorkTime::where('user_id', $userId)->orderBy('created_at', 'desc')->first()->id,
            'start_time' => Carbon::now(),
        ]);
        
        Status::where('user_id', auth()->id())->first()->update([
            'status' => '2'
        ]);

        return redirect('/');
    }

    public function breakFinish()
    {
        $workTimeId = WorkTime::where('user_id', auth()->id())->orderBy('created_at', 'desc')->first()->id;

        BreakTime::where('work_time_id', $workTimeId)->orderBy('created_at', 'desc')->first()->update([
            'finish_time' => Carbon::now()
        ]);

        Status::where('user_id', auth()->id())->first()->update([
            'status' => '1'
        ]);

        return redirect('/');
    }
}
