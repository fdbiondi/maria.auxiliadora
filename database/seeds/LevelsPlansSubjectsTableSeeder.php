<?php

use Illuminate\Database\Seeder;

class LevelsPlansSubjectsTableSeeder extends Seeder
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

        $plans = App\Entities\Plan::all();

        foreach ($plans as $plan) {
            $plan->subjects()->attach(factory(App\Entities\Subject::class, 10)->create());
        }
        //factory(App\Entities\Level::class, 5)->create();
    }
}
