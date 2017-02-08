<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Entities\Role::class)->create([
            'name' => 'Preceptor',
        ]);

        factory(App\Entities\Role::class)->create([
            'name' => 'Student',
        ]);

        factory(App\Entities\Role::class)->create([
            'name' => 'Professor',
        ]);

        factory(App\Entities\Role::class)->create([
            'name' => 'Secretary',
        ]);

        factory(App\Entities\Role::class)->create([
            'name' => 'Tutor',
        ]);

        factory(App\Entities\Role::class)->create([
            'name' => 'SuperAdmin',
        ]);
    }
}
