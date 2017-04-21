<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_quantity extends Model {

    protected $table = 'product_quantities';

    protected $fillable = [
        'product_id',
        'size_id',
        'color_id',
        'price',
        'price_sale',
        'quantity'
    ];

    public function color() {
        return $this->belongsTo('App\Product_color', 'color_id');
    }

    public function product() {
        return $this->belongsTo('App\Product', 'product_id');
    }

    public function size() {
        return $this->belongsTo('App\Product_size', 'size_id');
    }
}
