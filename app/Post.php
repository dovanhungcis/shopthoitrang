<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model {

    protected $table = 'posts';

    protected $fillable = [
        'img',
        'title',
        'slug',
        'description',
        'content',
        'like'
    ];

    public function category() {
        return $this->belongsToMany('App\Category', 'post_category', 'id_post', 'id_category');
    }

    public function tag() {
        return $this->belongsToMany('App\Tag', 'post_tags', 'id_post', 'id_tags');
    }
}
