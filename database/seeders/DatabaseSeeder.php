<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Media;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(50)->create();

        $posts = Post::factory(100)->has(Comment::factory(50)->recycle($users))->has(Media::factory(1))->recycle($users)->create();

        $amir = User::factory()
            ->has(Post::factory(20)
                ->has(Media::factory()))
            ->has(Comment::factory(20)
                ->recycle($posts))->create([
                    'name' => 'amir',
                    'email' => 'amir@gmail.com',
                    'password' => bcrypt('password'),
                ]);
    }
}
