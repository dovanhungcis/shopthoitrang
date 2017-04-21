<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Item\ItemRepository;
use App\Item;
use App\Http\Requests\StoreItemRequest;

class ItemController extends Controller {

    public function __construct(ItemRepository $item) {
        $this->item = $item;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $list = $this->item->list_with_paging();
        $listArr = $list->toArray();
        $currentPage = $listArr['current_page'];
        $perPage = $listArr['per_page'];
        $total = $listArr['total'];
        $thisPage = ($currentPage - 1) * $perPage + 1;
        $thisPageEnd = $currentPage * $perPage;
        if ($thisPageEnd >= $total) {
            $thisPageEnd = $total;
        }

        return view('admin.item.show', compact('list', 'thisPage', 'thisPageEnd', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request) {
        $this->item->item_store($request);

        return redirect()->route('admin@item@item')->with('success', 'Xong rồi');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $item = Item::where('id', $id)->first();

        return view('admin.item.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreItemRequest $request, $id) {
        $this->item->item_update($request, $id);

        return redirect()->route('admin@item@item')->with('success', 'Xong rồi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->item->item_destroy($id);

        return redirect()->route('admin@item@item')->with('success', 'Đã xóa');
    }
}
