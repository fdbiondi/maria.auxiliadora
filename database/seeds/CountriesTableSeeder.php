<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Entities\Country::class)->create([
            'name' => 'Argentina',
        ]);

        factory(App\Entities\Country::class)->create([
            'name' => 'Brasil',
        ]);
    }
}
