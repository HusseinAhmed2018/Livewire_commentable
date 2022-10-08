<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comments extends Component
{
    public $post,$comment,$comments;

    public function mount($post)
    {
        $this->post = $post;
        $this->comments = $post->comments;
    }

    public function render()
    {
        return view('livewire.comments');
    }

    public function submit()
    {
        $validatedData = $this->validate([
            'comment' => 'required|min:6',
        ]);

        $comments = $this->post->comments()->create([
            'body'      => $this->comment,
            'user_id'   => Auth::id()
        ]);

        if ($comments)
        {
            $this->comments = Post::find($this->post->id)->comments;
        }
    }

}
