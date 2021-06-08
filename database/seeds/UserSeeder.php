<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Juan Diego',
                'email' => 'jdcaceres12@outlook.com',
                'password' => Hash::make('Lima2021.'),
                'phone' => '945641881',
                'dni' => '47844160',
                'date_birth' => '1992-01-15',
                'city_id' => 2922,
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
