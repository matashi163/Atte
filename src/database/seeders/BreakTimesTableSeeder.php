<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\WorkTime;
use Faker\Factory;
use Carbon\Carbon;

class BreakTimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $workTimeIds = range(1, 100);

        $breakTimes = [];
        foreach($workTimeIds as $workTimeId) {
            $workTime = WorkTime::find($workTimeId);
            $workStartTime = $workTime->start_time;
            $workFinishTime = $workTime->finish_time;
            
            $startTime = $faker->dateTimeBetween($workStartTime, $workFinishTime);
            $finishTime = $faker->dateTimeBetween($startTime, $workFinishTime);

            $breakTimes[] = [
                'work_time_id' => $workTimeId,
                'start_time' => $startTime,
                'finish_time' => $finishTime,
            ];
        }

        DB::table('break_times')->insert($breakTimes);
    }
}
