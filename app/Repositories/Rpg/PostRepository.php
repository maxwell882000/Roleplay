<?php


namespace App\Repositories\Rpg;


use App\Post;

class PostRepository implements PostRepositoryInterface
{

    /**
     * Create a post
     *
     * @param $post_data array Post data
     * @return Post
     */
    public function create($post_data)
    {
        return Post::create($post_data);
    }

    /**
     * Update a post
     *
     * @param $post_id int Post's ID
     * @param $post_data array New data for post
     */
    public function update($post_id, $post_data)
    {
        Post::find($post_id)->update($post_data);
    }

    /**
     * Delete a post
     *
     * @param $post_id int Post's ID
     */
    public function delete($post_id)
    {
        Post::destroy($post_id);
    }

    /**
     * Get several last posts
     *
     * @param $limit int Limit of lasts posts
     * @return mixed
     */
    public function getLastPosts(int $limit)
    {
        return Post::orderBy('created_at', 'desc')->limit($limit)->get()->toArray();
    }

    /**
     * Get a post by it's ID
     *
     * @param int $postId
     * @return Post
     */
    public function getById(int $postId)
    {
        return Post::find($postId);
    }
}
