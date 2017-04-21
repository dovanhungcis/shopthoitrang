<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Cart\CartRepository;

class CartController extends Controller {
    public function __construct(CartRepository $cart) {
        $this->cart = $cart;
    }
    
    /**
     * function add cart by ajax
     *
     * @param Request $request            
     * @return number
     */
    public function addcart(Request $request) {
        return count ( $this->cart->add_cart ( $request ) );
    }
    
    /**
     * function get list order
     *
     * @return array list order
     */
    public function showCart() {
        return $this->cart->show_cart ();
    }
    
    /**
     * function add or sub quantity product order
     *
     * @param Request $request            
     */
    public function changeCart(Request $request) {
        return $this->cart->change_cart ( $request );
    }
    
    /**
     * function cancel product by method post
     *
     * @param Request $request            
     * @return number
     */
    public function cancelProduct(Request $request) {
        return count ( $this->cart->cancel_product ( $request ) );
    }
    
    /**
     * Display page checkout
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function checkout() {
        $products = $this->cart->getCheckout ();
        return view ( 'shop.checkout', [ 
                'products' => $products 
        ] );
    }
    
    /**
     * function save data order to database
     *
     * @param Request $request            
     * @return number
     */
    public function order(Request $request) {
        $this->cart->order ( $request );
        
        return 1;
    }
    
    /**
     * Display checkout success
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function success() {
        return view ( 'shop.success' );
    }
}
