<?php
namespace App\Repositories\Supplier;

use App\Supplier;

interface SupplierRepositoryInterface {

    public function supplier_store($param = []);

    public function supplier_update($param = [], $id);

    public function supplier_destroy($id);
}