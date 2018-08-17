<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use App\Area;
use App\Status;

use Session;
class ClientController extends Controller
{
    public function index(){
        $areas=Area::get();
        $status=Status::where('statusType','state')
            ->get();

        $clients=Client::select('clientName','address','areaName','statusName')
            ->leftJoin('area','area.areaId','client.areaId')
            ->leftJoin('status','status.statusId','client.statusId')
            ->get();

//        return $clients;

        return view('client.all',compact('areas','status','clients'));
    }

    public function insert(Request $r){

        $client=new Client();
        $client->clientName=$r->clientName;
        $client->address=$r->address;
        $client->areaId=$r->areaId;
        $client->statusId=$r->statusId;
        $client->save();


        Session::flash('message', 'Client added successfully!');
        return redirect()->route('client.all');

//        return $r;
    }
}
