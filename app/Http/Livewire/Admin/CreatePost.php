<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Psy\Readline\Hoa\Console;
use Symfony\Component\Console\Logger\ConsoleLogger;

class CreatePost extends Component
{
    public $open = false; //no lo uso

    public $name, $slug;/*  $extract, $body, $category_id, $status; */

    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required'
        ]);
    }

    public function storePost(){
        $this->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        Post::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'category_id' => '1',
            'user_id' => auth()->user()->id
        ]);

        $this->reset(['name', 'slug']);

        $this->emitTo('show-posts','render');

        $this->emit('alert', 'El Post se creó Satisfactoriamente.');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.create-post', compact('categories'));
    }
}
