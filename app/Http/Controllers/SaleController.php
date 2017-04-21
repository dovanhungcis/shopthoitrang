<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Sale\SaleRepository;
use App\Sale;
use App\Http\Requests\StoreSaleRequest;

class SaleController extends Controller {

    public function __construct(SaleRepository $sale) {
        $this->sale = $sale;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $list = $this->sale->list_with_paging();
        $listArr = $list->toArray();
        $currentPage = $listArr['current_page'];
        $perPage = $listArr['per_page'];
        $total = $listArr['total'];
        $thisPage = ($currentPage - 1) * $perPage + 1;
        $thisPageEnd = $currentPage * $perPage;
        if ($thisPageEnd >= $total) {
            $thisPageEnd = $total;
        }

        return view('admin.sale.show', compact('list', 'thisPage', 'thisPageEnd', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.sale.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSaleRequest $request) {
        $this->sale->sale_store($request);

        return redirect()->route('admin@sale@sale')->with('success', 'Xong rồi');
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
        $sale = Sale::where('id', $id)->first();

        return view('admin.sale.edit', compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSaleRequest $request, $id) {
        $this->sale->sale_update($request, $id);

        return redirect()->route('admin@sale@sale')->with('success', 'Xong rồi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->sale->sale_destroy($id);

        return redirect()->route('admin@sale@sale')->with('success', 'Đã xóa');
    }
}
