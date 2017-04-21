<?php
namespace App\Repositories\sale;

interface SaleRepositoryInterface {

    public function get_sales();

    public function get_best_sellers();

    public function get_comming_sales();

    public function get_product_by_sale_slug($slug);

    public function sale_store($param = []);

    public function sale_update($param = [], $id);

    public function sale_destroy($id);

    public function filter_product_by_id($data, $id_sale);

    public function get_deltail_product($slug);

    public function get_sale_by_slug($slug);
}