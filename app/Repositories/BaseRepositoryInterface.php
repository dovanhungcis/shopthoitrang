<?php
namespace App\Repositories;

interface BaseRepositoryInterface {

    public function list_with_paging($param = []);
}
