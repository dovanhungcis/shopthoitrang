<?php
namespace App\Repositories\Item;

use App\Repositories\BaseRepository;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use App\Repositories\Item\ItemRepositoryInterface;
use App\Item;

class ItemRepository extends BaseRepository implements ItemRepositoryInterface {

    public function __construct(Item $item) {
        parent::__construct($item);
    }

    public function item_store($params = []) {
        $data = $params->all();
        $data['slug'] = Str::slug($data['name']);

        return Item::create($data);
    }

    public function item_update($param = [], $id) {
        $item = Item::findOrFail($id);
        $data = $param->all();
        $item->name = $data['name'];
        $item->slug = Str::slug($data['name']);
        $item->save();
    }

    public function item_destroy($id) {
        $item = Item::findOrFail($id);
        $item->delete();
    }
}
