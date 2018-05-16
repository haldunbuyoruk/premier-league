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
        $this->call(TeamTableSeeder::class);
		$this->call(SeasonTableSeeder::class);
		$this->call(TeamStrengthTableSeeder::class);
		$this->call(WeekTableSeeder::class);
    }
}