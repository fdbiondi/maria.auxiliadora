<?php

use Illuminate\Database\Seeder;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Entities\Account::class)->create([
            'name' => 'Federico',
            'email' => 'fdbion@gmail.com',
            'password' => bcrypt('11235813'),
        ]);
        factory(App\Entities\Account::class)->create([
            'name' => 'David',
            'email' => 'david.boero@gmail.com',
            'password' => bcrypt('11235813'),
        ]);
        factory(App\Entities\Account::class)->create([
            'name' => 'Guido',
            'email' => 'gambrosino@gmail.com',
            'password' => bcrypt('11235813'),
        ]);
        factory(App\Entities\Account::class)->create([
            'name' => 'Lucas',
            'email' => 'lcs.arregui@gmail.com',
            'password' => bcrypt('11235813'),
        ]);
        factory(App\Entities\Account::class, 50)->create();
    }
}
