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
        factory(App\Entities\Level::class, 5)->create();

        foreach (App\Entities\Level::all() as $level) {
            factory(App\Entities\Plan::class)->create([
                'level_id' => $level->id
            ]);
        }
    }
}
