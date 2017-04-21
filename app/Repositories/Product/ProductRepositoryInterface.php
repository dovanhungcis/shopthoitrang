<?php
namespace App\Repositories\Product;

interface ProductRepositoryInterface {

    public function product_store($param = []);

    public function product_update($param = [], $id);

    public function product_destroy($id);

    public function get_all_sales();

    public function get_all_suppliers();

    public function get_all_items();
}