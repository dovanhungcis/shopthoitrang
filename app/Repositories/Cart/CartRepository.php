<?php
namespace App\Repositories\Cart;

use App\Product_quantities;
use App\Invoice;
use Sentinel;
use App\Invoice_Product;

class CartRepository implements CartRepositoryInterface {

    /**
     * function add cart by ajax
     * 
     * {@inheritdoc}
     *
     * @see \App\Repositories\Cart\CartRepositoryInterface::add_cart()
     */
    public function add_cart($request) {
        $value = $request->session()->get('cart');
        $product_id = (int)($request->data);
        $product = Product_quantities::find($product_id);
        
        if(isset($value[$request->data])){
            if($product->quantity > $value[$request->data]){
                $value[$request->data] = $value[$request->data] + 1;
            }
        }else{
            if($product->quantity > 0){
                $value[$request->data] = 1;
            }
        }
        session([
            'cart' => $value
        ]);
        return $request->session()->get('cart');
    }
    /**
     * function show list order 
     * {@inheritDoc}
     * @see \App\Repositories\Cart\CartRepositoryInterface::show_cart()
     */
    public function show_cart(){
        $value = session('cart');
        //dd($value);
        $orderList = array();
        foreach ($value as $key => $id){
            $orderList[$key] = Product_quantities::find($key);
            $orderList[$key]->quantitiesOrder = $id;
            $orderList[$key]->product = $orderList[$key]->product;
            $orderList[$key]->color = $orderList[$key]->Product_color;
            $orderList[$key]->size = $orderList[$key]->Product_sizes;
            if(count($orderList[$key]->product->product_images)>0)
                $orderList[$key]->image = $orderList[$key]->product->product_images[0];
            else 
                $orderList[$key]->image = '';
        }
      
        return $orderList;
    }
    
    /**
     * function add or sub quatity product
     * {@inheritDoc}
     * @see \App\Repositories\Cart\CartRepositoryInterface::change_cart()
     */
    public function change_cart($request){
        $value = $request->session()->get('cart');
        $product = Product_quantities::find($request->id);
        if(isset($value[$request->id])){
            if($product->quantity > $request->data){
                $value[$request->id] = $request->data;
            }
        }
        session([
            'cart' => $value
        ]);
        
        return $request->data;
    }
    /**
     * function delete product order
     * {@inheritDoc}
     * @see \App\Repositories\Cart\CartRepositoryInterface::cancel_product()
     */
    public function cancel_product($request){
        $value = $request->session()->get('cart');
        unset($value[$request->id]);
        session([
            'cart' => $value
        ]);
        
        return $request->session()->get('cart');
    }
    /**
     * function get list order product
     * {@inheritDoc}
     * @see \App\Repositories\Cart\CartRepositoryInterface::getCheckout()
     */
    public function getCheckout(){
        $value = session('cart');
        if(($value)==null)
            return 0;
        $orderList = array();
        foreach ($value as $key => $qty){
            $orderList[$key] = Product_quantities::find($key);
            $orderList[$key]->quantitiesOrder = $qty;
        }
        return $orderList;
    }
    
    /**
     * save data order to database
     * {@inheritDoc}
     * @see \App\Repositories\Cart\CartRepositoryInterface::order()
     */
    public function order($request){
        $value = $request->session()->get('cart');
        
        if($value == null)
            return 2;
        
        $total_money = 0;
        $orderList = array();
        foreach ($value as $key => $qty){
            $product = Product_quantities::find($key);
            $total_money += $product->price_sale* $qty;
            $invoice_product = new Invoice_Product();
            $invoice_product->id_invoice = 1;
            $invoice_product->id_product = $key;
            $invoice_product->quantity = $qty;
            $invoice_product->price = $product->price_sale;
            $orderList[$key] = $invoice_product;
        }
        $invoice = new Invoice();
        $invoice->id_user = Sentinel::getUser()->id;
        $invoice->address = $request->data['address'];
        $invoice->city = $request->data['city'];
        $invoice->district = $request->data['district'];
        $invoice->phone = $request->data['phone'];
        $invoice->price = $total_money+15000;
        $invoice->save();
        $invoice_new = Invoice::orderBy('id', 'desc')->limit(1)->get();
        foreach ($orderList as $value){
            $value->id_invoice = $invoice_new[0]->id;
             
            $value->save();
        }
        $request->session()->forget('cart');
    }
}
