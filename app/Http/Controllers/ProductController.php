<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepository;
use App\Product;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller {
    public function __construct(ProductRepository $product) {
        $this->product = $product;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $list = $this->product->list_with_paging ();
        $listArr = $list->toArray ();
        $currentPage = $listArr ['current_page'];
        $perPage = $listArr ['per_page'];
        $total = $listArr ['total'];
        $thisPage = ($currentPage - 1) * $perPage + 1;
        $thisPageEnd = $currentPage * $perPage;
        if ($thisPageEnd >= $total)
            $thisPageEnd = $total;
        
        return view ( 'admin.product.show', compact ( 'list', 'thisPage', 'thisPageEnd', 'total' ) );
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $sales = $this->product->get_all_sales ();
        $suppliers = $this->product->get_all_suppliers ();
        $items = $this->product->get_all_items ();
        
        return view ( 'admin.product.create', compact ( 'sales', 'suppliers', 'items' ) );
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request            
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request) {
        $this->product->product_store ( $request );
        
        return redirect ()->route ( 'admin@product@product' )->with ( 'success', 'Xong rồi' );
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
        $sales = $this->product->get_all_sales ();
        $suppliers = $this->product->get_all_suppliers ();
        $items = $this->product->get_all_items ();
        $product = Product::where ( 'id', $id )->first ();
        
        return view ( 'admin.product.edit', compact ( 'product', 'sales', 'suppliers', 'items' ) );
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request            
     * @param int $id            
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->product->product_update ( $request, $id );
        
        return redirect ()->route ( 'admin@product@product' )->with ( 'success', 'Xong rồi' );
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id            
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->product->product_destroy ( $id );
        
        return redirect ()->route ( 'admin@product@product' )->with ( 'success', 'Xong rồi' );
    }
}
