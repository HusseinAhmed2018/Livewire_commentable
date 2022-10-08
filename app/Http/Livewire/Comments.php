<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comments extends Component
{
    public $post,$comment,$comments;
    public $parent_id = null;
    public $form_title = 'Comment';

    public function mount($post)
    {
        $this->post = $post;
        $this->comments = $post->comments()->with('replies')->get();
    }

    public function render()
    {
        return view('livewire.comments')->extends('layouts.app')->section('content');
    }

    public function submit()
    {
        $validatedData = $this->validate([
            'comment' => 'required|min:6',
        ]);

        $comments = $this->post->comments()->create([
            'body'      => $this->comment,
            'user_id'   => Auth::id(),
            'parent_id' => $this->parent_id
        ]);

        if ($comments)
        {
            $this->comments = Post::find($this->post->id)->comments;
        }
    }

    public function replay($parent_id)
    {
        $this->parent_id = $parent_id;
        $this->form_title = 'replay';
    }
}
