<?php

namespace App\Repositories\Category;

use App\Category;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository
{

    public function __construct(Category $category)
    {
        parent::__construct($category);
    }

}
