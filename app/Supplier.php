<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model {

    protected $table = 'suppliers';

    protected $fillable = [
        'name',
        'slug',
        'photo'
    ];

    public function product() {
        return $this->hasMany('App\Product', 'products', 'id_supplies', 'id');
    }
}
