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

        User::create([
            'name' => 'Pratama',
            'email' => 'pratama@mail.com',
            'password' => bcrypt('12345'),
            'is_admin' => 0
        ]);

        Item::create([
            'code' => 'ASW0001',
            'name' => 'Sarang Walet',
            'type' => 'Padat',
            'stock' => 15,
            'price' => 55000
        ]);

        Item::create([
            'code' => 'ASW0002',
            'name' => 'Rokok Batang',
            'type' => 'Batang',
            'stock' => 25,
            'price' => 15000
        ]);

        Transaction::create([
            'code' => 'TRK0001',
            'date' => date("Y/m/d"),
            'jumlah' => 2,
            'total' => 110000,
            'user_id' => 1,
            'item_id' => 1
        ]);
    }
}
