<?php

namespace Database\Seeders;

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
        DB::table('posts')->insert([
            'category_id' => '1',
            'title' => 'My first post',
            'slug' => 'my-first-post',
            'excerpt' => 'Cum vita assimilant',
            'body' => 'Enlightenment facilitates when you grasp with relativity.',
            'published_at' => now(),
        ]);
    }
}
