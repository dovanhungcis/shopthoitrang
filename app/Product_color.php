<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_color extends Model {

    protected $table = 'product_colors';

    protected $fillable = [
        'color',
        'bc'
    ];

    public function product_quantity() {
        return $this->hasMany('App\Product_quantity', 'color_id');
    }
}
