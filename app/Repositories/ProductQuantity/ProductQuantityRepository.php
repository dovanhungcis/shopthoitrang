<?php
namespace App\Repositories\ProductQuantity;

use App\Repositories\BaseRepository;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use App\Product;
use App\Product_quantity;
use Illuminate\Support\Facades\DB;
use App\Product_size;
use App\Product_color;

class ProductQuantityRepository extends BaseRepository implements ProductQuantityRepositoryInterface {

    public function __construct(Product_quantity $product_quantity) {
        parent::__construct($product_quantity);
    }

    public function product_quantity_store($param = []) {
        $data = $param->all();

        return Product_quantity::create($data);
    }

    public function product_quantity_update($param = [], $id) {
        $product = Product::findOrFail($id);
        $data = $param->all();
        $product->name = $data['name'];
        $product->slug = Str::slug($data['name']);
        $product->quantity = $data['quantity'];
        $product->detail_product = $data['detail_product'];
        $product->detail_size = $data['detail_size'];
        $product->detail_information = $data['detail_information'];
        $product->material_storage = $data['material_storage'];
        $product->save();
    }

    public function product_quantity_destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();
    }

    public function get_product_detail($id) {
        return $productqty = Product_quantity::where('product_id', $id)->paginate(5);
    }

    public function get_product($id) {
        return $product = Product::findOrFail($id);
    }

    public function get_all_sizes() {
        return $sizes = Product_size::all();
    }

    public function get_all_colors() {
        return $colors = Product_color::all();
    }
}
