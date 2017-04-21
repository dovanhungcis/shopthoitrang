<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model {

    protected $table = 'invoices';

    protected $fillable = [
        'id_user',
        'address',
        'district',
        'city',
        'phone',
        'price'
    ];

    public function user() {
        return $this->belongsTo('App\User', 'id_user');
    }

    public function invoice_product() {
        return $this->hasMany('App\Invoice_Product', 'id_invoice');
    }
}
