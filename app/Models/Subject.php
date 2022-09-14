<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
      /**
     * The attributes that are mass assigable.
     * 
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function posts() {
        return $this->hasMany(Post::class);
    }
}
