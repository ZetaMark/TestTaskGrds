<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
          [
              'name' => 'Пользователь не известен',
              'email' => 'user_unknown@g.g',
              'password' => bcrypt(STR::random(16)),

          ],
          [
              'name' => 'Пользователь',
              'email' => 'user1@g.g',
              'password' => bcrypt('123123'),
          ],
        ];
        \DB::table('users')->insert($data);
    }
}
