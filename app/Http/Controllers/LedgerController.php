<?php

namespace App\Http\Controllers;

use App\Client;
use App\InvoiceMain;
use Illuminate\Http\Request;
use PDF;

class LedgerController extends Controller
{
    public function index(){
        $clients=Client::select('clientId','clientName','areaId')->get();


//        return $clients;
        return view('ledger.index');
    }

    public function get($id){
        $client=Client::leftJoin('area','area.areaId','client.areaId')->findOrFail($id);

        $invoiceMain=InvoiceMain::where('clientId',$id)->get();
//        return view('ledger.pdf',compact('client','invoiceMain'));
        $pdf = PDF::loadView('ledger.pdf',compact('client','invoiceMain'));
        return $pdf->stream('123456.pdf',array('Attachment'=>0));
    }
}
