<?php
namespace App\Repositories\Sale;

use App\Repositories\Sale\SaleRepositoryInterface;
use DB;
use App\Sale;
use App\Product;
use App\Repositories\BaseRepository;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;

class SaleRepository extends BaseRepository implements SaleRepositoryInterface {

    public function __construct(Sale $sale) {
        parent::__construct($sale);
    }

    public function get_best_sellers() {
        return Product::orderBy('products.sold', 'DESC')->limit(10)->get();
    }

    public function get_sales() {
        $currentDate = date('Y-m-d');
        return Sale::orderBy('id', 'DESC')->Where([
            [
                'start_date',
                '<=',
                date('Y-m-d')
            ],
            [
                'end_date',
                '>=',
                date('Y-m-d')
            ]
        ])
            ->limit(60)
            ->get();
    }

    public function get_comming_sales() {
        return Sale::orderBy('id', 'DESC')->Where([
            [
                'start_date',
                '>',
                date('Y-m-d')
            ]
        ])
            ->limit(60)
            ->get();
    }

    public function get_product_by_sale_slug($slug) {
        $idSale = Sale::where('slug', 'like', $slug)->get();
        if (count($idSale) == 0)
            return $idSale;
        $products = Product::where('id_sale', '=', $idSale[0]->id)->get();

        return $products;
    }

    public function sale_store($param = []) {
        $data = $param->all();
        $data['slug'] = Str::slug($data['name']);
        if (Input::hasFile('img_event')) {
            $file = Input::file('img_event');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('/admin1/assets/uploads/sales/'), $filename);
            $data['img_event'] = $filename;
        }
        if (Input::hasFile('img_banner')) {
            $file = Input::file('img_banner');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('/admin1/assets/uploads/sales/'), $filename);
            $data['img_banner'] = $filename;
        }
        return Sale::create($data);
    }

    public function sale_update($param = [], $id) {
        $sale = Sale::findOrFail($id);
        $data = $param->all();
        $sale->name = $data['name'];
        $sale->slug = Str::slug($data['name']);
        $sale->start_date = $data['start_date'];
        $sale->end_date = $data['end_date'];
        if (Input::hasFile('img_event')) {
            $file = Input::file('img_event');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('/admin1/assets/uploads/sales/'), $filename);
            $sale->img_event = $filename;
        }
        if (Input::hasFile('img_banner')) {
            $file = Input::file('img_banner');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('/admin1/assets/uploads/sales/'), $filename);
            $sale->img_banner = $filename;
        }
        $sale->save();
    }

    public function sale_destroy($id) {
        $sale = Sale::findOrFail($id);
        $sale->delete();
    }

    /**
     * function filter product
     *
     * @param unknown $data
     * @param unknown $id_sale
     * @return NULL[]
     */
    public function filter_product_by_id($data, $id_sale) {
        $result = array();
        foreach ($data as $key => $id_item) {
            $result[$key] = DB::table('products')->where([
                [
                    'id_sale',
                    '=',
                    $id_sale
                ],
                [
                    'id_item',
                    '=',
                    $id_item
                ]
            ])->get();
        }

        foreach ($result as $i => $val) {
            foreach ($val as $key => $item) {
                $result[$i]['item'] = DB::table('items')->where('id', '=', $item->id_item)
                    ->select('name')
                    ->get();
                $result[$i]['image'] = DB::table('product_images')->where('product_id', '=', $item->id)
                    ->select('photo')
                    ->limit(1)
                    ->get();
                $result[$i]['price'] = DB::table('product_quantities')->where('product_id', '=', $item->id)
                    ->select('price', 'price_sale')
                    ->limit(1)
                    ->get();
            }
        }

        return $result;
    }

    /**
     * function get deltail product
     *
     * {@inheritdoc}
     *
     * @see \App\Repositories\sale\SaleRepositoryInterface::get_deltail_product()
     */
    public function get_deltail_product($slug) {
        return Product::where([
            [
                'slug',
                '=',
                $slug
            ],
            [
                'quantity',
                '>',
                0
            ]
        ])->get();
    }

    /**
     * function get sale by slug
     *
     * {@inheritdoc}
     *
     * @see \App\Repositories\sale\SaleRepositoryInterface::get_sale_by_slug()
     */
    public function get_sale_by_slug($slug) {
        return Sale::where('slug', '=', $slug)->get();
    }
}