<?php

namespace Database\Seeders;

use App\Models\Post;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('ar_SA');

        Post::create([
            'title'  =>  $faker->realText(10),
            'body'   =>  $faker->paragraph,
        ]);
    }
}
