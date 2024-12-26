<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WorkTimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = range(1, 10);
        $startDate = Carbon::today()->subDays(10);
        $endDate = Carbon::yesterday();

        $dates = [];
        for ($date = $startDate; $date <= $endDate; $date->addDay()) {
            $dates[] = $date->copy();
        }

        $workTimes = [];
        foreach ($dates as $date) {
            foreach ($users as $userId) {
                $startTime = $date->copy()->addHours(rand(8, 10))->addMinutes(rand(0, 59))->addSeconds(rand(0, 59));
                $finishTime = $startTime->copy()->addHours(rand(8, 10))->addMinutes(rand(0, 59))->addSeconds(rand(0, 59));

                $workTimes[] = [
                    'user_id' => $userId,
                    'start_time' => $startTime,
                    'finish_time' => $finishTime,
                ];
            }
        }

        DB::table('work_times')->insert($workTimes);
    }
}
