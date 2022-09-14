<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'content'
    ];
    
    public function posts() {
        return $this->belongsToMany(Post::class);
    }
}
