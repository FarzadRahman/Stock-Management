<?php

namespace App\Http\Controllers;

use App\InvoiceMain;
use App\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function insertModal(Request $r){
        $invoice=InvoiceMain::leftJoin('client','client.clientId','invoice_main.clientId')
            ->findOrFail($r->invId);


        $payment=Payment::where('invoiceMainId',$r->invId)->get();
        return view('payment.insertModal',compact('invoice','payment'));
    }

    public function insertPayment($id,Request $r){
        $payment=new Payment();
        $payment->invoiceMainId=$id;
        $payment->payment=$r->amount;
        $payment->save();


        $invoice=InvoiceMain::findOrFail($id);
        $netPayment=$invoice->cashReceived;
        $netPayment+=$r->amount;
        $invoice->cashReceived=$netPayment;
        if($invoice->total ==$netPayment){
            $invoice->statusId=6;
        }
        else{
            $invoice->statusId=5;
        }

        $invoice->save();

        return redirect()->route('invoice');


    }
}
