<?php
namespace App\Repositories\Item;

use App\Item;

interface ItemRepositoryInterface {

    public function item_store($param = []);

    public function item_update($param = [], $id);

    public function item_destroy($id);
}