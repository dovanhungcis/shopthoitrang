<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_size extends Model {

    protected $table = 'product_sizes';

    protected $fillable = [
        'size'
    ];

    public function product_quantity() {
        return $this->hasMany('App\Product_quantity', 'size_id');
    }
}
