<?php
namespace App\Repositories\Blog;

use App\Repositories\Blog\BlogRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Post;
use DB;
use App\Category;

class BlogRepository extends BaseRepository implements BlogRepositoryInterface {

    public function __construct(Post $post) {
        parent::__construct($post);
    }

    /**
     * function get related post
     * 
     * {@inheritdoc}
     *
     * @see \App\Repositories\Blog\BlogRepositoryInterface::get_related_post()
     */
    public function get_related_post($id) {
        return DB::table('post_category')->join('posts', 'posts.id', '=', 'post_category.id_post')
            ->join('categories', 'categories.id', '=', 'post_category.id_category')
            ->select('posts.*', 'categories.name')
            ->where('categories.id', $id)
            ->orderBy('posts.id', 'DESC')
            ->limit(3)
            ->get();
    }

    /**
     * function get list post by category slug
     * 
     * {@inheritdoc}
     *
     * @see \App\Repositories\Blog\BlogRepositoryInterface::get_post_by_category_slug()
     */
    public function get_post_by_category_slug($slug) {
        return DB::table('post_category')->join('posts', 'posts.id', '=', 'post_category.id_post')
            ->join('categories', 'categories.id', '=', 'post_category.id_category')
            ->select('posts.*', 'categories.name')
            ->where('categories.slug', $slug)
            ->orderBy('posts.id', 'DESC')
            ->paginate(12);
    }

    /**
     * function get list post by tag
     * 
     * {@inheritdoc}
     *
     * @see \App\Repositories\Blog\BlogRepositoryInterface::get_post_by_tag_slug()
     */
    public function get_post_by_tag_slug($slug) {
        return DB::table('post_tags')->join('posts', 'posts.id', '=', 'post_tags.id_post')
            ->join('tags', 'tags.id', '=', 'post_tags.id_tags')
            ->select('posts.*', 'tags.name')
            ->where('tags.slug', $slug)
            ->orderBy('posts.id', 'DESC')
            ->paginate(12);
    }

    /**
     * function search post by string
     * 
     * {@inheritdoc}
     *
     * @see \App\Repositories\Blog\BlogRepositoryInterface::search()
     */
    public function search($str) {
        $posts = Post::with('category')->where('title', 'like', "%$str%")
            ->orwhere("description", 'like', "%$str%")
            ->orwhere("likes", 'like', "%$str%")
            ->orwhere("content", 'like', "%$str%")
            ->paginate(10);
        $posts->value = $str;
        
        return $posts;
    }
}