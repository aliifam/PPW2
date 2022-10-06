<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     *
     * @return void
     */

    private $_posts = [
        [
            "title" => "First Post",
            "description" => "This is the first post",
            "created_at" => "2021-01-01 00:00:00",
            "updated_at" => "2021-01-01 00:00:00",
        ],
        [
            "title" => "Second Post",
            "description" => "This is the second post",
            "created_at" => "2021-01-02 00:00:00",
            "updated_at" => "2021-01-02 00:00:00",
        ],
        [
            "title" => "Third Post",
            "description" => "This is the third post",
            "created_at" => "2021-01-03 00:00:00",
            "updated_at" => "2021-01-03 00:00:00",
        ],
        [
            "title" => "Fourth Post",
            "description" => "This is the fourth post",
            "created_at" => "2021-01-04 00:00:00",
            "updated_at" => "2021-01-04 00:00:00",
        ],
        [
            "title" => "Fifth Post",
            "description" => "This is the fifth post",
            "created_at" => "2021-01-05 00:00:00",
            "updated_at" => "2021-01-05 00:00:00",
        ],
        [
            "title" => "Sixth Post",
            "description" => "This is the sixth post",
            "created_at" => "2021-01-06 00:00:00",
            "updated_at" => "2021-01-06 00:00:00",
        ],
        [
            "title" => "Seventh Post",
            "description" => "This is the seventh post",
            "created_at" => "2021-01-07 00:00:00",
            "updated_at" => "2021-01-07 00:00:00",
        ],
        [
            "title" => "Eighth Post",
            "description" => "This is the eighth post",
            "created_at" => "2021-01-08 00:00:00",
            "updated_at" => "2021-01-08 00:00:00",
        ],
        [
            "title" => "Ninth Post",
            "description" => "This is the ninth post",
            "created_at" => "2021-01-09 00:00:00",
            "updated_at" => "2021-01-09 00:00:00",
        ],
        [
            "title" => "Tenth Post",
            "description" => "This is the tenth post",
            "created_at" => "2021-01-10 00:00:00",
            "updated_at" => "2021-01-10 00:00:00",
        ],
        [
            "title" => "Eleventh Post",
            "description" => "This is the eleventh post",
            "created_at" => "2021-01-11 00:00:00",
            "updated_at" => "2021-01-11 00:00:00",
        ],
        [
            "title" => "Twelfth Post",
            "description" => "This is the twelfth post",
            "created_at" => "2021-01-12 00:00:00",
            "updated_at" => "2021-01-12 00:00:00",
        ],
        [
            "title" => "Thirteenth Post",
            "description" => "This is the thirteenth post",
            "created_at" => "2021-01-13 00:00:00",
            "updated_at" => "2021-01-13 00:00:00",
        ],
        [
            "title" => "Fourteenth Post",
            "description" => "This is the fourteenth post",
            "created_at" => "2021-01-14 00:00:00",
            "updated_at" => "2021-01-14 00:00:00",
        ],
        [
            "title" => "Fifteenth Post",
            "description" => "This is the fifteenth post",
            "created_at" => "2021-01-15 00:00:00",
            "updated_at" => "2021-01-15 00:00:00",
        ],
        [
            "title" => "Sixteenth Post",
            "description" => "This is the sixteenth post",
            "created_at" => "2021-01-16 00:00:00",
            "updated_at" => "2021-01-16 00:00:00",
        ],
        [
            "title" => "Seventeenth Post",
            "description" => "This is the seventeenth post",
            "created_at" => "2021-01-17 00:00:00",
            "updated_at" => "2021-01-17 00:00:00",
        ],
        [
            "title" => "Eighteenth Post",
            "description" => "This is the eighteenth post",
            "created_at" => "2021-01-18 00:00:00",
            "updated_at" => "2021-01-18 00:00:00",
        ],
        [
            "title" => "Nineteenth Post",
            "description" => "This is the nineteenth post",
            "created_at" => "2021-01-19 00:00:00",
            "updated_at" => "2021-01-19 00:00:00",
        ],
        [
            "title" => "Twentieth Post",
            "description" => "This is the twentieth post",
            "created_at" => "2021-01-20 00:00:00",
            "updated_at" => "2021-01-20 00:00:00",
        ],
    ];
    public function run()
    {
        $data = [];
        foreach ($this->_posts as $post){
            $data[] = [
                'title' => $post['title'],
                'description' => $post['description'],
                'created_at' => $post['created_at'],
                'updated_at' => $post['updated_at']
            ];
        }
        DB::table('posts')->insert($data);
    }
}
