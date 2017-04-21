<?php

namespace App\Http\ViewComposer;

use Illuminate\View\View;
use App\Post;
class PostComposer {
    public function compose(View $view) {
        $featured = Post::with ( 'category' )->orderBy ( "likes", 'DESC' )->limit ( 5 )->get ();
        $view->with ( 
                'featured',
                $featured 
        );
    }
}