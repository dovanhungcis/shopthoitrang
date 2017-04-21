<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_sizes extends Model {

    protected $table = 'product_sizes';

    protected $fillable = [
        'size'
    ];
}
