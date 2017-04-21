<?php
namespace App\Repositories\Post;

use App\Post;
use App\Repositories\BaseRepository;
use App\Category;
use App\Tag;

class PostRepository extends BaseRepository implements PostRepositoryInterface {

    public function __construct(Post $post) {
        parent::__construct($post);
    }

    public function list_with_categories_and_paging($params = ['perPage' => 10]) {
        return Post::with('category')->orderBy('id', 'DESC')->paginate($params['perPage']);
    }

    public function update_view_post(Post $post) {
        $post->view = $post->view + 1;

        return $post->save();
    }

    public function get_all_category() {
        return $category = Category::all();
    }

    public function get_all_tag() {
        return $tag = Tag::all();
    }
}
