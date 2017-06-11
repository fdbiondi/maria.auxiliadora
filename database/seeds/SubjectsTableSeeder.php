<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = App\Entities\Plan::all();

        foreach ($plans as $plan) {
            $plan->subjects()->attach(factory(App\Entities\Subject::class, 10)->create());
        }
    }
}
