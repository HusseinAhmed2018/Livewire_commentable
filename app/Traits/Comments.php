<?php


namespace App\Traits;


use App\Models\Comment;

trait Comments
{

    public function get_comments()
    {
        return $this->morphMany(Comments::class,'commentable');
    }
}
