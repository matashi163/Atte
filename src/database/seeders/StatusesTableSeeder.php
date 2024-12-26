<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'user_id' => '1',
            'status' => '0',
        ]);
        Status::create([
            'user_id' => '2',
            'status' => '0',
        ]);
        Status::create([
            'user_id' => '3',
            'status' => '0',
        ]);
        Status::create([
            'user_id' => '4',
            'status' => '0',
        ]);
        Status::create([
            'user_id' => '5',
            'status' => '0',
        ]);
        Status::create([
            'user_id' => '6',
            'status' => '0',
        ]);
        Status::create([
            'user_id' => '7',
            'status' => '0',
        ]);
        Status::create([
            'user_id' => '8',
            'status' => '0',
        ]);
        Status::create([
            'user_id' => '9',
            'status' => '0',
        ]);
        Status::create([
            'user_id' => '10',
            'status' => '0',
        ]);
    }
}
