<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPosts extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    public $post;

    protected $listeners = ['render' => 'render'];

    //Se resetea la paginación para que la busqueda encuentre algo, por más que estemos en otra página.
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        /* $posts = Post::all(); */
        //Creo que recupero los post del usuario logueado
        $posts = Post::where('user_id', '=', auth()->user()->id)
                        ->where('name','LIKE','%'.$this->search.'%')
                        ->where('extract','LIKE','%'.$this->search.'%')
                        ->orderby($this->sort, $this->direction)
                        ->paginate(5);
                        //->latest('id')
                        //->get();
                        
        /* return view('posts.index', compact('posts')); */
        
        return view('livewire.admin.show-posts', compact('posts'));
    }

    /**
     * Función necesaria para ordenar según la selección en la cabecera de tabla
     */
    public function order($orden){

        if ($this->sort == $orden) {
            if($this->direction == 'desc'){
                $this->direction = 'asc';
            }
            else{
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $orden;
        }
        
        $this->sort = $orden;
    }

    public $name, $slug, $extract, $body;

    public function show(Post $post){
        $this->name = $post->name;
        $this->slug = $post->slug;
        $this->extract = $post->extract;
        $this->body = $post->body;

        $this->dispatchBrowserEvent('open-modal-show');
    }

    public function cerrarModalShow(){
        $this->name = '';
        $this->slug = '';
        $this->extract = '';
        $this->body = '';
    
        $this->dispatchBrowserEvent('close-modal-show');
        
    }
}
