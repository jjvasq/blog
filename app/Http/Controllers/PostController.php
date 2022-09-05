<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
/**
 * Controlador princpal de Posts
 */
class PostController extends Controller
{
    //En la vista index, se acceden a los post publicados (status=2)
    public function index(){
        $posts = Post::where('status', 2)
                        ->latest('id')
                        ->paginate(8);
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post){
        //return $post;

        $similares = Post::where('category_id', $post->category_id)
                            ->where('id', '!=', $post->id)
                            ->where('status', 2)
                            ->latest('id')
                            ->take(4)
                            ->get();

        return view('posts.show', compact('post', 'similares'));
    }

    public function category(Category $category){
        $posts = Post::where('category_id', $category->id)
                        ->where('status', 2)
                        ->latest('id')
                        ->paginate(3);

        return view('posts.category', compact('posts', 'category'));
    }

    public function tag(Tag $tag){
        /* $posts = Post::where('tag_id', $tag->id)
                        ->where('status', 2)
                        ->latest('id')
                        ->paginate(3);
        return view('posts.tag', compact('posts')); */
        $posts = $tag->posts()->where('status', 2)->latest('id')->paginate(3);
        return view('posts.tag', compact('posts', 'tag'));
    }
}
