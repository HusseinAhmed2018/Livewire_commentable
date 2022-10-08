<?php

namespace App\Models;

use App\Traits\Comments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory,Comments;

    public $fillable =[
        'title',
        'body',
    ];

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }
}
