<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=30; $i++){
            Image::create([
                'url' => 'posts/'.$i.'.png',
                'imageable_id' => $i%4,
                'imageable_type' => Post::class,
            ]);
        }
    }
}
