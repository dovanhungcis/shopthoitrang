<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductQuantity\ProductQuantityRepository;
use Illuminate\Support\Facades\Redirect;

class ProductQuantityController extends Controller {

    public function __construct(ProductQuantityRepository $product_quantity) {
        $this->product_quantity = $product_quantity;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $list = $this->product_quantity->list_with_paging();
        $listArr = $list->toArray();
        $currentPage = $listArr['current_page'];
        $perPage = $listArr['per_page'];
        $total = $listArr['total'];
        $thisPage = ($currentPage - 1) * $perPage + 1;
        $thisPageEnd = $currentPage * $perPage;
        if ($thisPageEnd >= $total)
            $thisPageEnd = $total;

        return view('admin.productquantity.show', compact('list', 'thisPage', 'thisPageEnd', 'total'));
    }

    public function create($id) {
        $product = $this->product_quantity->get_product($id);
        $sizes = $this->product_quantity->get_all_sizes();
        $colors = $this->product_quantity->get_all_colors();

        return view('admin.productquantity.create', compact('product', 'sizes', 'colors'));
    }

    public function store(Request $request) {
        $this->product_quantity->product_quantity_store($request);

        return Redirect::back()->with('success', 'Đã thêm, tiếp tục thêm, bấm quay lại để xem danh sách số lượng');
    }

    public function show($id) {
        $list = $this->product_quantity->get_product_detail($id);
        $listArr = $list->toArray();
        $currentPage = $listArr['current_page'];
        $perPage = $listArr['per_page'];
        $total = $listArr['total'];
        $thisPage = ($currentPage - 1) * $perPage + 1;
        $thisPageEnd = $currentPage * $perPage;
        if ($thisPageEnd >= $total)
            $thisPageEnd = $total;
        $product = $this->product_quantity->get_product($id);
        $countPhoto = $product->product_images->count();

        return view('admin.productquantity.detail', compact('list', 'thisPage', 'thisPageEnd', 'total', 'product', 'countPhoto'));
    }
}
