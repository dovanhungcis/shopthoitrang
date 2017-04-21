<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_quantities extends Model {

    protected $table = 'product_quantities';

    protected $fillable = [
        'product_id',
        'size_id',
        'color_id',
        'price',
        '	price_sale',
        'quantity'
    ];

    public function Product_color() {
        return $this->belongsTo('App\Product_color', 'color_id');
    }

    public function Product_sizes() {
        return $this->belongsTo('App\Product_sizes', 'size_id');
    }

    public function Product() {
        return $this->belongsTo('App\Product', 'product_id');
    }
}
