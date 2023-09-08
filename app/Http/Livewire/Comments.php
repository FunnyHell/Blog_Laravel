<?php

namespace App\Http\Livewire;

use App\Http\Controllers\CommentController;
use Livewire\Component;

class Comments extends Component
{
    public function mount($post_id)
    {
        $this->comments = CommentController::GetPostComments($post_id);
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
