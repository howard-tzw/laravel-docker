<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assigable.
     * 
     * @var array
     */
    protected $fillable = [
        'content'
    ];

    public function subject() {
        return $this->belongsTo(Subject::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
