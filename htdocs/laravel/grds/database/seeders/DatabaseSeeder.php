<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this -> call(UsersTableSeeder::class);
        $this -> call(ShopCategoriesTableSeeder::class);
        \App\Models\ShopProducts::factory(100)->create();
        \App\Models\ShopOrders::factory(100)->create();
    }
}
