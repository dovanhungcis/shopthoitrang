<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface {

    protected $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function list_with_paging($params = ['perPage' => 10]) {
        return $this->model->orderBy('id', 'DESC')->paginate($params['perPage']);
    }
}