<?php

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Entities\Province::class)->create([
            'name' => 'Santa Fe',
            'country_id' => 1,
        ]);

        factory(App\Entities\Province::class)->create([
            'name' => 'Cordoba',
            'country_id' => 1,
        ]);

        factory(App\Entities\Province::class)->create([
            'name' => 'Buenos Aires',
            'country_id' => 1,
        ]);
    }
}
