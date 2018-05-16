<?php
use App\Models\Season;
use Illuminate\Database\Seeder;

class SeasonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function() {
            Season::insert([
                ['name' => '1 st Season', 'finished' => 0]
            ]);
        });
    }
}
