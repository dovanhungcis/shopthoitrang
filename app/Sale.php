<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model {

    protected $table = 'sales';

    protected $fillable = [
        'name',
        'slug',
        'img_event',
        'img_banner',
        'start_date',
        'end_date'
    ];

    public function product() {
        return $this->hasMany('App\Product', 'id_sale');
    }
}
