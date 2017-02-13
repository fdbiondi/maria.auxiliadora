<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Entities\User::class)->create([
            'name' => 'Federico',
            'last_name' => 'Biondi',
            'email' => 'fdbion@gmail.com',
            'password' => bcrypt('11235813'),
            'dni' => '35462239',
            'city_id' => 1,
            'role_id' => 6
        ]);
        factory(App\Entities\User::class)->create([
            'name' => 'David',
            'last_name' => 'Boero',
            'email' => 'david.boero@gmail.com',
            'password' => bcrypt('11235813'),
            'dni' => '35111111',
            'city_id' => 1,
            'role_id' => 6
        ]);
        factory(App\Entities\User::class)->create([
            'name' => 'Guido',
            'last_name' => 'Ambrosino',
            'email' => 'ambrosino.guido@gmail.com',
            'password' => bcrypt('11235813'),
            'dni' => '35222222',
            'city_id' => 1,
            'role_id' => 6
        ]);
        factory(App\Entities\User::class)->create([
            'name' => 'Lucas',
            'last_name' => 'Arregui',
            'email' => 'lcs.arregui@gmail.com',
            'password' => bcrypt('11235813'),
            'dni' => '35333333',
            'city_id' => 1,
            'role_id' => 6
        ]);
        factory(App\Entities\User::class, 50)->create();
    }
}
