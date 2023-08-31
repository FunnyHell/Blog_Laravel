<?php

namespace App\Http\Livewire;

use App\Http\Controllers\LevelAccessController;
use Livewire\Component;

class NewPost extends Component
{
    public function mount(){
        $this->levels = LevelAccessController::getPostsLevels();
    }
    public function render()
    {
        return view('livewire.new-post');
    }
}
