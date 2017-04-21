<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $table = 'products';

    protected $fillable = [
        'id_sale',
        'id_supplier',
        'id_item',
        'name',
        'slug',
        'quantity',
        'sold',
        'detail_product',
        'detail_size',
        'detail_information',
        'material_storage'
    ];

    public $timestamps = true;

    public function sale() {
        return $this->belongsTo('App\Sale', 'id_sale');
    }

    public function supplier() {
        return $this->belongsTo('App\Supplier', 'id_supplier');
    }

    public function item() {
        return $this->belongsTo('App\Item', 'id_item');
    }

    public function product_images() {
        return $this->hasMany('App\Product_img', 'product_id');
    }

    public function product_quantity() {
        return $this->hasMany('App\Product_quantity', 'product_id');
    }

    public function product_quantities() {
        return $this->hasMany('App\product_quantities', 'product_id');
    }

    /*
     * public function product_images() {
     *
     * return $this->belongsToMany('App\Product_img', 'product_id');
     * }
     */
}
