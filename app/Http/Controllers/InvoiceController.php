<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class InvoiceController extends Controller
{
   public function generate(){

//       return view('pdf');
       $pdf = PDF::loadView('pdf');
       return $pdf->stream('123456.pdf',array('Attachment'=>0));
   }
}
