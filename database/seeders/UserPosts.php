<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserPosts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_posts')->truncate();
        DB::table('user_posts')->insert([
        [
            'user_id' => 1,
            'image' => null,
            'description' =>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer",
            'likes'=> 0,
        ],
        [
            'user_id' => 1,
            'image' => null,
            'description' =>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer",
            'likes'=> 0,
        ],
        [
            'user_id' => 1,
            'image' => null,
            'description' =>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer",
            'likes'=> 0,
        ],
        [
            'user_id' => 1,
            'image' => null,
            'description' =>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer",
            'likes'=> 0,
        ]

        ]);
    }
}
