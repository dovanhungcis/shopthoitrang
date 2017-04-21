<?php
namespace App\Repositories\Cart;

interface CartRepositoryInterface {

    public function add_cart($request);
    
    public function show_cart();
    
    public function change_cart($request);
    
    public function cancel_product($request);
    
    public function getCheckout();
    
    public function order($request);
}