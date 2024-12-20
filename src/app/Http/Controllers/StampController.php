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
        $status = User::find(auth()->id())->status()->first()->status;
        $check = WorkTime::where('user_id', auth()->id())->whereDate('start_time', Carbon::today())->exists();
        
        return view('stamp', compact('status', 'check'));
    }

    public function workStart()
    {
        WorkTime::create([
            'user_id' => auth()->id(),
            'start_time' => Carbon::now(),
        ]);

        Status::where('user_id', auth()->id())->first()->update(['status' => '1']);

        return redirect('/');
    }

    public function workFinish()
    {
        WorkTime::where('user_id', auth()->id())->orderBy('created_at', 'desc')->first()->update(['finish_time' => Carbon::now()]);

        Status::where('user_id', auth()->id())->first()->update(['status' => '0']);

        return redirect('/');
    }

    public function breakStart()
    {
        BreakTime::create([
            'work_time_id' => WorkTime::where('user_id', auth()->id())->orderBy('created_at', 'desc')->first()->id,
            'start_time' => Carbon::now(),
        ]);
        
        Status::where('user_id', auth()->id())->first()->update(['status' => '2']);

        return redirect('/');
    }

    public function breakFinish()
    {
        BreakTime::where('work_time_id', WorkTime::where('user_id', auth()->id())->orderBy('created_at', 'desc')->first()->id)->orderBy('created_at', 'desc')->first()->update(['finish_time' => Carbon::now()]);

        Status::where('user_id', auth()->id())->first()->update(['status' => '1']);

        return redirect('/');
    }
}
