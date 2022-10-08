<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('ar_SA');
        $posts = Post::all();

        foreach ($posts as $post)
        {
            if (!Comment::where(['commentable_type' => 'App\Models\Post','commentable_id' => $post->id])->count())
            {
                $user_id = User::inRandomOrder()->first()->id;

                Comment::create([
                    'body'             => $faker->realText(10),
                    'commentable_type' => 'App\Models\Post',
                    'commentable_id'   => $post->id,
                    'user_id'          => $post->id,
                ]);
            }
        }
    }
}
