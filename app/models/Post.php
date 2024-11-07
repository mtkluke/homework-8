<?php

namespace app\models;

class Post {
    private $posts = [
        ['id' => 1, 'title' => 'First Post', 'content' => 'This is the first post content.'],
        ['id' => 2, 'title' => 'Second Post', 'content' => 'This is the second post content.']
    ];

    public function getAllPostsByTitle($params) {
        if (!empty($params['title'])) {
            return array_filter($this->posts, function ($post) use ($params) {
                return stripos($post['title'], $params['title']) !== false;
            });
        }
        return $this->posts;
    }

    public function savePost($title, $content) {
        $newPost = [
            'id' => count($this->posts) + 1,
            'title' => htmlspecialchars($title),
            'content' => htmlspecialchars($content)
        ];
        $this->posts[] = $newPost;
        return $newPost;
    }
}
