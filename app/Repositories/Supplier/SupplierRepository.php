<?php
namespace App\Repositories\Supplier;

use App\Repositories\BaseRepository;
use App\Supplier;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;

class SupplierRepository extends BaseRepository implements SupplierRepositoryInterface {

    public function __construct(Supplier $supplier) {
        parent::__construct($supplier);
    }

    public function supplier_store($params = []) {
        $data = $params->all();
        $data['slug'] = Str::slug($data['name']);
        $data['photo'] = '';
        if (Input::hasFile('photo')) {
            $file = Input::file('photo');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('/admin1/assets/uploads/suppliers/'), $filename);
            $data['photo'] = $filename;
        }

        return Supplier::create($data);
    }

    public function supplier_update($param = [], $id) {
        $supplier = Supplier::findOrFail($id);
        $data = $param->all();
        $supplier->name = $data['name'];
        $supplier->slug = Str::slug($data['name']);
        if (Input::hasFile('photo')) {
            $file = Input::file('photo');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('/admin1/assets/uploads/suppliers/'), $filename);
            $supplier->photo = $filename;
        }
        $supplier->save();
    }

    public function supplier_destroy($id) {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
    }
}
