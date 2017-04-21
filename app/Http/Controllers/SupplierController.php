<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Supplier\SupplierRepository;
use App\Supplier;
use App\Http\Requests\StoreSupplierRequest;

class SupplierController extends Controller {

    public function __construct(SupplierRepository $supplier) {
        $this->supplier = $supplier;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $list = $this->supplier->list_with_paging();
        $listArr = $list->toArray();
        $currentPage = $listArr['current_page'];
        $perPage = $listArr['per_page'];
        $total = $listArr['total'];
        $thisPage = ($currentPage - 1) * $perPage + 1;
        $thisPageEnd = $currentPage * $perPage;
        if ($thisPageEnd >= $total)
            $thisPageEnd = $total;

        return view('admin.supplier.show', compact('list', 'thisPage', 'thisPageEnd', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupplierRequest $request) {
        $this->supplier->supplier_store($request);

        return redirect()->route('admin@supplier@supplier')->with('success', 'Xong rồi');
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
        $supplier = Supplier::where('id', $id)->first();

        return view('admin.supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSupplierRequest $request, $id) {
        $this->supplier->supplier_update($request, $id);

        return redirect()->route('admin@supplier@supplier')->with('success', 'Xong rồi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->supplier->supplier_destroy($id);

        return redirect()->route('admin@supplier@supplier')->with('success', 'Đã xóa');
    }
}
