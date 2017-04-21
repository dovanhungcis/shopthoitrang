<?php
namespace App\Http\Controllers;

use App\Post;
use App\Repositories\Blog\BlogRepository;
use Illuminate\Contracts\View\View;
use App\Category;
use Illuminate\Http\Request;

class BlogController extends Controller {

    public function __construct(BlogRepository $blog) {
        $this->blog = $blog;
    }

    /**
     * Display a home page of Blog
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        $posts = $this->blog->list_with_paging();

        return view('welcome', [
            'posts' => $posts
        ]);
    }

    /**
     * Display a post page of blog
     *
     * @param $id of
     *            post
     * @param $slug of
     *            post
     * @return \Illuminate\View\View
     */
    public function post($id, $slug) {
        $post = Post::find($id);
        if (! isset($post))
            return view('errors.404');
        $related = $this->blog->get_related_post($post->category[0]->id);

        return view('post', [
            'post' => $post,
            'related' => $related
        ]);
    }

    /**
     * Display a list posts by category
     *
     * @param $slug of
     *            category
     * @return \Illuminate\View\View
     */
    public function get_category($slug) {
        $posts = $this->blog->get_post_by_category_slug($slug);

        if (count($posts[0]) == 0)
            return view('errors.404');

        return view('category', [
            'posts' => $posts,
            'value' => 'Category'
        ]);
    }

    /**
     * Display list posts by tag
     *
     * @param $slug of
     *            tag
     * @return \Illuminate\View\View
     */
    public function get_tag($slug) {
        $posts = $this->blog->get_post_by_tag_slug($slug);
        if (count($posts[0]) == 0)
            return view('errors.404');

        return view('category', [
            'posts' => $posts,
            'value' => 'Tag'
        ]);
    }

    /**
     * update like number of post
     *
     * @param $id of
     *            post
     * @return like number of post
     */
    public function like($id) {
        $post = Post::find($id);
        $post->likes = $post->likes + 1;
        $post->Save();

        return $post->likes;
    }

    /**
     * Display list posts
     *
     * @param
     *            string
     * @return \Illuminate\View\View
     */
    public function search(Request $request) {
        $posts = $this->blog->search($request->s);

        return view('search', [
            'posts' => $posts
        ]);
    }
}
