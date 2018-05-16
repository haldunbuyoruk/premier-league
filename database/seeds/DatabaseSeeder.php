<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TeamTableSeeder::class,SeasonTableSeeder::class,TeamStrengthTableSeeder::class,WeekTableSeeder::class);
    }
}