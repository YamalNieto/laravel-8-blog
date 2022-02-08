<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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


//        DB::transaction(function() {
//            $this->call([
//                UsersTableSeeder::class,
//                PostsTableSeeder::class,
//                CategoriesTableSeeder::class,
//            ]);
//        });

        $admin = User::create([
            'username' => 'admin',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'is_admin' => true
        ]);

        $user = User::create([
            'username' => 'yamal',
            'name' => 'Yamal',
            'email' => 'yamal@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'is_admin' => false
        ]);

        Post::factory(5)->create([
            'user_id' => $admin->id
        ]);

        Post::factory(5)->create([
            'user_id' => $user->id
        ]);

        Post::factory(20)->create();

        Comment::factory(20)->create();
    }
}
