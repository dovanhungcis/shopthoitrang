<?php
namespace App\Repositories\ProductQuantity;

interface ProductQuantityRepositoryInterface {

    public function product_quantity_store($param = []);

    public function product_quantity_update($param = [], $id);

    public function product_quantity_destroy($id);

    public function get_product_detail($id);

    public function get_product($id);

    public function get_all_sizes();

    public function get_all_colors();
}