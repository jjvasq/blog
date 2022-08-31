<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
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
}
