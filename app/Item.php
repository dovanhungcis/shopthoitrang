<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {

    protected $table = 'items';

    protected $fillable = [
        'name',
        'slug'
    ];

    public function product() {
        return $this->hasMany('App\Product', 'products', 'id_items', 'id');
    }
}
