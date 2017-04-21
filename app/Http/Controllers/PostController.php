<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Repositories\Post\PostRepository;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller {

    public function __construct(PostRepository $post) {
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $list = $this->post->list_with_categories_and_paging();
        $listArr = $list->toArray();
        $currentPage = $listArr['current_page'];
        $perPage = $listArr['per_page'];
        $total = $listArr['total'];
        $thisPage = ($currentPage - 1) * $perPage + 1;
        $thisPageEnd = $currentPage * $perPage;
        if ($thisPageEnd >= $total)
            $thisPageEnd = $total;

        return view('admin.post.show', compact('list', 'category', 'thisPage', 'thisPageEnd', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categories = $this->post->get_all_category();
        $tags = $this->post->get_all_tag();

        return view('admin.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request) {
        $data = $request->all();
        $post = new Post();
        $post->title = $data['title'];
        $post->slug = Str::slug($data['title']);
        $post->description = $data['description'];
        $post->content = $data['content'];
        if (Input::hasFile('img')) {
            $file = Input::file('img');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('/admin1/assets/uploads/posts/'), $filename);
            $post->img = $filename;
        }
        $post->save();

        $post->category()->sync($request->input('id_categories', []));
        $post->tag()->sync($request->input('id_tags', []));

        return redirect()->route('admin@post@post')->with('success', 'Xong rồi');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $categories = $this->post->get_all_category();
        $tags = $this->post->get_all_tag();
        $post = Post::where('id', $id)->first();
        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $post = Post::findOrFail($id);
        $data = $request->all();
        $post->title = $data['title'];
        $post->slug = Str::slug($data['title']);
        $post->description = $data['description'];
        $post->content = $data['content'];
        if (Input::hasFile('img')) {
            $file = Input::file('img');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('/admin1/assets/uploads/posts/'), $filename);
            $post->img = $filename;
        }
        $post->save();

        $post->category()->sync($request->input('id_categories', []));
        $post->tag()->sync($request->input('id_tags', []));
        return redirect()->route('admin@post@post')->with('success', 'Xong rồi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('admin@post@post')->with('success', 'Đã xóa');
    }
}
