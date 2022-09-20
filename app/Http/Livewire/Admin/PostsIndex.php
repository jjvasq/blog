<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Post;
use Livewire\WithPagination;

class PostsIndex extends Component
{
    use WithPagination;
    
    protected $paginationTheme = "bootstrap";

    public $search;

    //Se resetea la paginación para que la busqueda encuentre algo, por más que estemos en otra página.
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::where('user_id', auth()->user()->id)
                        ->where('name','LIKE',"%".$this->search.'%')
                        ->latest('id')
                        ->paginate(6);

        return view('livewire.admin.posts-index', compact('posts'));
    }
}
