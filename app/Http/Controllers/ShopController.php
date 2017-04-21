<?php
namespace App\Http\Controllers;

use App\Sale;
use App\Repositories\Sale\SaleRepository;
use Illuminate\Http\Request;
use App\User;
use Sentinel;

class ShopController extends Controller {

    public function __construct(SaleRepository $sale) {
        $this->sale = $sale;
    }

    /**
     * Display a home page of shop.
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index() {
        $sales = $this->sale->get_sales();

        $best_sellers = $this->sale->get_best_sellers();
        // dd($best_sellers);
        $comming = $this->sale->get_comming_sales();
        return view('shop.index', [
            'sales' => $sales,
            'best_seller' => $best_sellers,
            'comming' => $comming
        ]);
    }

    /**
     * Display list products
     *
     * @param $slug of
     *            products
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function products($slug) {
        $products = $this->sale->get_product_by_sale_slug($slug);

        if (count($products) == 0)

            return view('errors.404');

        return view('shop.products', [
            'products' => $products
        ]);
    }

    /**
     * Display list products comming sale
     *
     * @param unknown $slug
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function upcoming($slug) {
        $sale = $this->sale->get_sale_by_slug($slug);
        if (count($sale) == 0)

            return view('errors.404');

        return view('shop.comming', [
            'sale' => $sale
        ]);
    }

    /**
     * Display filter product by category
     *
     * @param Request $request
     * @return NULL[]
     */
    public function filter(Request $request) {
        return ($this->sale->filter_product_by_id($request->data, $request->sales));
    }

    /**
     * Display detail product
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function single($slug) {
        $product = $this->sale->get_deltail_product($slug);
        if (count($product) == 0)

            return view('errors.404');

        return view('shop.single', [
            'product' => $product
        ]);
    }

    public function account() {
        $user = User::find(Sentinel::getUser()->id);
        return view('shop.account', [
            'user' => $user
        ]);
    }
}
