<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => '一郎',
            'email' => 'ichiro@example.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => '二郎',
            'email' => 'jiro@example.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => '三郎',
            'email' => 'saburo@example.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => '四郎',
            'email' => 'shiro@example.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => '五郎',
            'email' => 'goro@example.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => '六郎',
            'email' => 'rokuro@example.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => '七郎',
            'email' => 'nanaro@example.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => '八郎',
            'email' => 'hachiro@example.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => '九郎',
            'email' => 'kyuro@example.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => '十郎',
            'email' => 'juro@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
