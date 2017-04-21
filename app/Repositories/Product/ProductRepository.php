<?php
namespace App\Repositories\Product;

use App\Repositories\BaseRepository;
use App\Supplier;
use Illuminate\Support\Str;
use App\Product;
use App\Sale;
use App\Item;
use App\Product_img;
use Illuminate\Support\Facades\Input;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface {

    public function __construct(Product $product) {
        parent::__construct($product);
    }

    public function product_store($param = []) {
        $data = $param->all();
        $data['slug'] = Str::slug($data['name']);
        $product = Product::create($data);
        $files = $data['photos'];

        foreach ($files as $file) {
            $filename = $file->getClientOriginalName();
            $file->move(public_path('/admin1/assets/uploads/posts/'), $filename);
            Product_img::create([
                'product_id' => $product->id,
                'photo' => $filename
            ]);
        }

        return 'Upload successful!';
    }

    public function product_update($param = [], $id) {
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
        $files = $data['photos'];

        foreach ($files as $file) {
            $filename = $file->getClientOriginalName();
            $file->move(public_path('/admin1/assets/uploads/posts/'), $filename);
            Product_img::create([
                'product_id' => $product->id,
                'photo' => $filename
            ]);
        }

        return 'Upload successful!';
    }

    public function product_destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();
    }

    public function get_all_sales() {
        return $sale = Sale::all();
    }

    public function get_all_suppliers() {
        return $supplier = Supplier::all();
    }

    public function get_all_items() {
        return $item = Item::all();
    }
}
