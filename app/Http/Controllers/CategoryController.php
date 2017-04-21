<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Support\Str;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller {

    public function __construct(CategoryRepository $category) {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $list = $this->category->list_with_paging();
        $listArr = $list->toArray();
        $currentPage = $listArr['current_page'];
        $perPage = $listArr['per_page'];
        $total = $listArr['total'];
        $thisPage = ($currentPage - 1) * $perPage + 1;
        $thisPageEnd = $currentPage * $perPage;
        if ($thisPageEnd >= $total)
            $thisPageEnd = $total;

        return view('admin.category.show', compact('list', 'thisPage', 'thisPageEnd', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request) {
        $data = $request->all();
        $data['slug'] = Str::slug($data['name']);
        Category::create($data);

        return redirect()->route('admin@category@category')->with('success', 'Xong rồi');
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
        $category = Category::where('id', $id)->first();

        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->save();

        return redirect()->route('admin@category@category')->with('success', 'Xong rồi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin@category@category')->with('success', 'Đã xóa');
    }
}
