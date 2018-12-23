<?php

namespace App\Http\Controllers;

use App\Status;
use App\StockLog;
use Illuminate\Http\Request;
use App\Product;

use Session;

use Image;
use Yajra\DataTables\DataTables;
use Auth;
use DB;
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   public function index(){
       $status=Status::where('statusType','state')
           ->get();



       return view('product.all',compact('status'));
   }

   public function getProductData(Request $r){
//       SELECT productId,SUM(quantity)-SUM(sold) as stock FROM `stock_log` GROUP BY productId
//       $products=Product::leftJoin('status','status.statusId','product.statusId')->get();
       $products=Product::select('product.*','status.statusName',DB::raw('SUM(stock_log.quantity)-SUM(stock_log.sold) as currentStock'))
           ->leftJoin('stock_log','product.productId','stock_log.productId')
           ->leftJoin('status','status.statusId','product.statusId')
           ->groupBy('product.productId')
           ->get();

       $datatables = Datatables::of($products);
       return $datatables->make(true);
   }

   public function insert(Request $r){
       $validatedData = $r->validate([
           'productName' => 'required|max:255',
           'sku' => 'max:40',
           'code' => 'required|max:100',
           'price' => 'required|integer',
           'image'=>'image|mimes:jpeg,jpg',
       ]);
       if($r->id){
           $product=Product::findOrFail($r->id);

           Session::flash('message', 'Product Updated successfully!');
       }
       else{
           $product=new Product();
           Session::flash('message', 'Product Added successfully!');
       }

       $product->productName=$r->productName;
       $product->statusId=$r->status;
       $product->sku=$r->sku;
       $product->code=$r->code;
       $product->price=$r->price;
       $product->save();
       if($r->hasFile('image')){
           $img = $r->file('image');

           $filename= $product->productId.'image'.'.'.$img->getClientOriginalExtension();
           $product->image=$filename;
           $location = public_path('images/products/'.$filename);
           Image::make($img)->save($location);

           $location2 = public_path('images/products/thumb/'.$filename);
           Image::make($img)->resize(200, null, function ($constraint) {
               $constraint->aspectRatio();
           })->save($location2);
           $product->save();
       }



       return redirect()->route('product.all');
       }

       public function edit(Request $r){
            $product=Product::findOrFail($r->productId);

            $status=Status::where('statusType','state')
                ->get();

            return view('product.edit',compact('product','status'));
       }

       public function stock(Request $r){
           $product=Product::findOrFail($r->productId);
           return view('product.stock',compact('product'));

       }

       public function insertQuantity(Request $r){
           $product=Product::findOrFail($r->productId);
           $total=$product->stock;
           $total+=$r->quantity;
           $product->stock=$total;
           $product->save();
           $status=Status::where('statusType','stock')
                ->where('statusName','increase')
                ->first();

            $log=new StockLog();
            $log->productId=$r->productId;
            $log->statusId=$status->statusId;
            $log->quantity=$r->quantity;
            $log->userId=Auth::user()->userId;
            $log->save();

        return redirect()->route('product.all');
       }
}
