<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    protected $table = 'tags';

    protected $fillable = [
        'name',
        'slug'
    ];

    public function post() {
        return $this->belongsToMany('App\Post', 'post_tags', 'id_post', 'id_tag');
    }
}
