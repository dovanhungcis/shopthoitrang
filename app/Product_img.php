<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_img extends Model {

    protected $table = 'product_images';

    protected $fillable = [
        'product_id',
        'photo'
    ];

    public function product() {
        return $this->belongsTo('App\Product', 'product_id');
    }
}
