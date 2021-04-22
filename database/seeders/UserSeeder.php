<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [];

        $users[] = [
            'name' => 'jack',
            'email' => 'email@mail.ru',
            'password' => bcrypt(123),
        ];

        $users[] = [
            'name' => 'john',
            'email' => 'sfs@sfw.ru',
            'password'=> bcrypt(123)
        ];
        DB::table('users')->insert($users);
    }
}
