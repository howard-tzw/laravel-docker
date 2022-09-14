<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    protected $table = "post_tag"; // 若不加這行，seeding 的時候 laravel 會自動抓 post_tags 於是就會報錯
    protected $fillable = [
        'post_id',
        'tag_id'
    ];
}
