<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug'
    ];

    public function post() {
        return $this->belongsToMany('App\Post', 'post_category', 'id_post', 'id_category');
    }
}
