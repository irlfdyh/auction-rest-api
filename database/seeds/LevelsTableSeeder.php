<?php

use Illuminate\Database\Seeder;
use App\Level;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levelName = [
            ['level' => 'administrator'],
            ['level' => 'officer'],
            ['level' => 'society'],
        ];

        foreach ($levelName as $level) {
            Level::Create($level);
        }
    }
}
