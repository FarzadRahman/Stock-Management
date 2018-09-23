<?php

namespace App\Http\Controllers;

use App\InvoiceMain;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $sales=InvoiceMain::select('client.clientName',DB::raw('sum(invoice_main.total) as sale'),DB::raw('sum(invoice_main.cashReceived) as cashReceived'))
            ->leftJoin('client','client.clientId','invoice_main.clientId')
            ->groupBy('invoice_main.clientId')
            ->get();

        return view('dashboard',compact('sales'));
    }
}
