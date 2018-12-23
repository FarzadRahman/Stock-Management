<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Client;
use App\InvoiceChild;
use App\InvoiceMain;
use App\Product;
use Illuminate\Http\Request;
use PDF;
use Session;
class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $invoice=InvoiceMain::select('invoice_mainId','invoiceNumber','clientName','total','cashReceived','invoice_main.created_at','statusName')
            ->leftJoin('client','client.clientId','invoice_main.clientId')
            ->leftJoin('status','status.statusId','invoice_main.statusId')
            ->orderBy('invoice_mainId','desc')
            ->get();

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
       $sum=0;

       foreach ($cart as $product){
           $invoiceChild=new InvoiceChild();
           $invoiceChild->productId=$product->productId;
           $invoiceChild->quantity=$product->quantity;
           $invoiceChild->rate=$product->rate;

           $invoiceChild->discount=$product->discount;
           $invoiceChild->invoiceMainId= $invoice->invoice_mainId;
           $invoiceChild->save();
           $sum+=$product->quantity*$product->rate*(100-$product->discount)/100;
       }


       $invoice->total=$sum;
       $invoice->invoiceNumber=date('y-m-d').'_'.$invoice->invoice_mainId;
       $invoice->save();

       $carts=InvoiceChild::where('invoiceMainId',$invoice->invoice_mainId)
           ->leftJoin('product','product.productId','invoice_child.productId')
           ->get();

       Cart::truncate();

       Session::flash('message', 'Your Invoice Number is '.$invoice->invoiceNumber.' <a class="btn btn-success btn-sm" href="'.route("invoice.get",["id"=>$invoice->invoice_mainId]).'">Download</a>');

       return redirect()->route('bill.create');
   }

   public function get($id){
        $invoice=InvoiceMain::select('invoice_main.*','clientName','areaName','address')
            ->leftJoin('client','client.clientId','invoice_main.clientId')
            ->leftJoin('area','area.areaId','client.areaId')
            ->findOrFail($id);




       $carts=InvoiceChild::where('invoiceMainId',$id)
           ->leftJoin('product','product.productId','invoice_child.productId')
           ->get();


       $pdf = PDF::loadView('pdf',compact('carts','invoice'));
       return $pdf->stream('123456.pdf',array('Attachment'=>0));
   }

   public function bill(){
       $clients=Client::where('statusId',1)->get();
       $products=Product::where('statusId',1)->get();


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
