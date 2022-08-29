<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    /**
     * Le agrego 2 etiquetas a cada post.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();
        foreach($posts as $post){
            $post->tags()->attach([
                rand(1, 4),
                rand(5, 8)
            ]);
        }
    }
}
