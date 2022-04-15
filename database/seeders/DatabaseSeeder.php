<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Item;
use App\Models\Transaction;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Cristiana',
            'email' => 'cristiana@mail.com',
            'password' => bcrypt('12345'),
            'is_admin' => 1
        ]);

        Item::create([
            'code' => 'ASW0001',
            'name' => 'Sarang Walet',
            'type' => 'Padat',
            'stock' => 15,
            'price' => 55000
        ]);

        Item::create([
            'code' => 'TRK0001',
            'date' => date("Y/m/d"),
            'total' => 105000,
            'user_id' => 1
        ]);
    }
}
