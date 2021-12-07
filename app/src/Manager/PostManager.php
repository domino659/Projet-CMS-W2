<?php

namespace App\Manager;

use App\Entity\Post;

class PostManager extends BaseManager
{


    /**
     * @return Post[]
     */
    public function getAllPosts(): array
    {
        // TODO -  Get all posts
        return [];
    }

    public function getPostById(int $id): Post
    {
        // TODO - Posts by Id
    }

    /**
     * @param Post $post
     * @return Post|bool
     */
    public function createPost(Post $post)
    {
        // TODO - create post
        return true;
    }

    /**
     * @param Post $post
     * @return Post|bool
     */
    public function updatePost(Post $post)
    {
        // TODO - getPostById($post->getId())
    }

    /**
     * @param int $id
     * @return bool
     */
    public function deletePostById(int $id): bool
    {
        // TODO - Delete post
    }
}