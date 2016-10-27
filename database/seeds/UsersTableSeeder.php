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
            'email' => 'fdbion@gmail.com',
            'password' => bcrypt('11235813'),
        ]);
        factory(App\Entities\User::class)->create([
            'name' => 'David',
            'email' => 'david.boero@gmail.com',
            'password' => bcrypt('11235813'),
        ]);
        factory(App\Entities\User::class)->create([
            'name' => 'Guido',
            'email' => 'gambrosino@gmail.com',
            'password' => bcrypt('11235813'),
        ]);
        factory(App\Entities\User::class)->create([
            'name' => 'Lucas',
            'email' => 'lcs.arregui@gmail.com',
            'password' => bcrypt('11235813'),
        ]);
        factory(App\Entities\User::class, 50)->create();
    }
}
