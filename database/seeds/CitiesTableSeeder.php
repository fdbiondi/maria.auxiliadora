<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Entities\City::class)->create([
            'name' => 'Rosario',
            'province_id' => 1,
        ]);

        factory(App\Entities\City::class)->create([
            'name' => 'Cordoba',
            'province_id' => 2,
        ]);
    }
}
