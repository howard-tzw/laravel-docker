<?php

namespace App\Services;

use App\Models\Post;
/**
 * Class InspiringService
 */
class InspiringService
{
    /**
     * @return string
     */
    public function inspire() {
        $quotes = [
            '「失敗為成功之母。」- 愛迪生',
            '「簡潔是最終的精密。」– 李奧納多‧達文西',
            '「好的開始是成功的一半」- 荷拉斯',
        ];
        $key = rand(0, 2);
        return $quotes[$key];
    }

    public function getAllPosts() {
        $posts = (new Post())::all();
        return $posts;
    }

    public function add($quote) {
        $post = new Post();
        $post->content = $quote;
        $post->save();
        return $post;
    }
}