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
            'name' => 'preceptor',
        ]);

        factory(App\Entities\Role::class)->create([
            'name' => 'student',
        ]);

        factory(App\Entities\Role::class)->create([
            'name' => 'professor',
        ]);

        factory(App\Entities\Role::class)->create([
            'name' => 'secretary',
        ]);

        factory(App\Entities\Role::class)->create([
            'name' => 'tutor',
        ]);

        factory(App\Entities\Role::class)->create([
            'name' => 'admin',
        ]);
    }
}
