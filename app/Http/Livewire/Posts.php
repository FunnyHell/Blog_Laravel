<?php

namespace App\Http\Livewire;

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Posts extends Component
{
    public function mount(){
        $this->posts = PostController::GetPosts(Auth::user()->id);
    }
    public function render()
    {
        return view('livewire.posts');
    }
}
