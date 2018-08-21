<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   public function index(){
       return view('product.all');
   }

   public function insert(Request $r){
        return $r;
   }
}
