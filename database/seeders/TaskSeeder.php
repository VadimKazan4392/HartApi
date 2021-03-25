<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = [];
        $cTask = null;

        for($i = 1; $i <11; $i++) {

            $cTask = "Задание № $i";

            $tasks[] = [
                'title' => $cTask,
                'description' => Str::random('19'),
                'user_id' => 1
            ];
        }
        DB::table('tasks')->insert($tasks);
    }
}