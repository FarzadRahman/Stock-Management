<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Client;
use App\Product;
use Illuminate\Http\Request;
use PDF;
class InvoiceController extends Controller
{
   public function generate(){

       $temp=Cart::leftJoin('product','product.productId','cart.productId')
           ->get();
       $cart=$temp;
//       Cart::truncate();
//       return $cart;

       $pdf = PDF::loadView('pdf',compact('cart'));
//
       return $pdf->stream('123456.pdf',array('Attachment'=>0));
   }
   public function bill(){
       $clients=Client::get();
       $products=Product::get();


       return view('bill.create',compact('clients','products'));
   }

   public function deleteProduct(Request $r){
       Cart::where('cartId',$r->id)->delete();
   }

   public function clearCart(){
       Cart::truncate();
   }

   public function addCart(Request $r){
       $product=Product::findOrFail($r->productId)->price;
       $cart=new Cart();
       $cart->productId=$r->productId;
       $cart->rate=$product;
       $cart->save();
       return $product;
   }
   public function refreshCart(Request $r){

       $cart=Cart::leftJoin('product','product.productId','cart.productId')->get();

       return view('bill.cart',compact('cart'));
   }

   public function changeDiscount(Request $r){
       $cart=Cart::findOrFail($r->id);
       $cart->discount=$r->discount;
       $cart->save();

   }
   public function changeQuantity(Request $r){
       $cart=Cart::findOrFail($r->id);
       $cart->quantity=$r->quantity;
       $cart->save();

   }
}
