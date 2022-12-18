<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 40; $i++) {
            $data[] = [
                'title' => $faker->sentence,
                'body' => $faker->paragraph,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('posts')->insert($data);
    }
}
