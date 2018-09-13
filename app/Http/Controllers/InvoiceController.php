<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Client;
use App\InvoiceChild;
use App\InvoiceMain;
use App\Product;
use Illuminate\Http\Request;
use PDF;
class InvoiceController extends Controller
{

    public function index(){
        $invoice=InvoiceMain::select('invoice_mainId','invoiceNumber','clientName','total','cashReceived','invoice_main.created_at','statusName')
            ->leftJoin('client','client.clientId','invoice_main.clientId')
            ->leftJoin('status','status.statusId','invoice_main.statusId')
            ->get();

//        return $invoice;
        return view('invoice',compact('invoice'));
    }

   public function generate($clientId){


       $cart=Cart::leftJoin('product','product.productId','cart.productId')
           ->get();
       $invoice=new InvoiceMain();
       $invoice->invoiceNumber="123456";
       $invoice->clientId=$clientId;
       $invoice->statusId=5;
       $invoice->save();

       foreach ($cart as $product){
           $invoiceChild=new InvoiceChild();
           $invoiceChild->productId=$product->productId;
           $invoiceChild->quantity=$product->quantity;
           $invoiceChild->rate=$product->rate;

           $invoiceChild->discount=$product->discount;
           $invoiceChild->invoiceMainId= $invoice->invoice_mainId;
           $invoiceChild->save();
       }
       Cart::truncate();

       $cart=InvoiceChild::where('invoiceMainId',$invoice->invoice_mainId)
           ->leftJoin('product','product.productId','invoice_child.productId')
           ->get();


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
