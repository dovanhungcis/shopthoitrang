<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_Product extends Model {

    protected $table = 'invoice_product';

    protected $fillable = [
        'id_invoice',
        'id_product',
        'quantity',
        'price'
    ];

    public function invoice() {
        return $this->belongsTo('App\Invoice', 'id_invoice');
    }

    public function product() {
        return $this->belongsTo('App\Product_quantities', 'id_product');
    }
}
