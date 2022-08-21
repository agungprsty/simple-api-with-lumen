<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository extends BaseRepository
{
    /**
    * Initiation post by user ID.
    *
    * @return Post
    */
    protected function posts()
    {
        $uid = auth()->user()->id;
        return Post::where('uid', $uid);
    }

     /**
     * Get all post.
     *
     * @return Post
     */
    public function all()
    {
        return $this->posts()->get();
    }

     /**
     * Get by id post.
     *
     * @param String $id
     * @return Post
     */
    public function get_by_id(string $id)
    {
        return $this->posts()->find($id);
    }

    /**
     * Create new post
     *
     * @return Post
     */
    public function store()
    {
        $input = request()->all();
        $input['uid'] = auth()->user()->id;
    
        $post = Post::create($input);
        return $this->get_by_id($post->id);
    }

    /**
     * Update post
     *
     * @param Object $data
     * @return Post
     */
    public function update(object $data)
    {
        $post = $this->posts()->find($data->id);
        $post->title = request()->input('title');
        $post->body = request()->input('body');
        $post->save();

        return $this->get_by_id($post->id); 
    }

     /**
     * Delete post.
     *
     * @param String $id
     * @return Post
     */
    public function delete(string $id)
    {
        $post = $this->posts()->find($id);
        if ($post){
            $post->delete();
        }

        return $post;
    }
}