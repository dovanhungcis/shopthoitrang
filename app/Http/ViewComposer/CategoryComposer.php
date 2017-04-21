<?php

namespace App\Http\ViewComposer;

use Illuminate\View\View;
use App\Category;

class CategoryComposer {
    public function compose(View $view) {
        $categoriesBlog = Category::orderBy ( 'id', 'ASC' )->get ();
        
        $view->with ( 
                'categoriesBlog',
                $categoriesBlog 
         );
    }
}