<?php

use Illuminate\Database\Seeder;

class LevelsPlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Entities\Level::class, 5)->create()->each(function($level) {
            $level->plans()->save(factory(App\Entities\Plan::class)->make());
        });
    }
}
