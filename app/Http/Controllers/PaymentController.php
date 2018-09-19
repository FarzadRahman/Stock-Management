<?php

namespace App\Http\Controllers;

use App\InvoiceMain;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function insertModal(Request $r){
        $invoice=InvoiceMain::leftJoin('client','client.clientId','invoice_main.clientId')
            ->findOrFail($r->invId);

        return view('payment.insertModal',compact('invoice'));
    }

    public function insertPayment($id,Request $r){

        $invoice=InvoiceMain::findOrFail($id);
        $invoice->cashReceived=$r->amount;
        $invoice->statusId=6;
        $invoice->save();

        return redirect()->route('invoice');


    }
}
