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

        $clients=Client::select('clientId','clientName','address','areaName','statusName')
            ->leftJoin('area','area.areaId','client.areaId')
            ->leftJoin('status','status.statusId','client.statusId')
            ->get();

//        return $clients;

        return view('client.all',compact('areas','status','clients'));
    }

    public function insert(Request $r){

        if($r->clientId){
            $client=Client::findOrFail($r->clientId);
            Session::flash('message', 'Client Edited successfully!');

        }
        else{
            $client=new Client();
            Session::flash('message', 'Client added successfully!');
        }


        $client->clientName=$r->clientName;
        $client->address=$r->address;
        $client->areaId=$r->areaId;
        $client->statusId=$r->statusId;
        $client->save();


        return redirect()->route('client.all');

    }

    public function edit(Request $r){
        $client=Client::findOrFail($r->clientId);
        $areas=Area::get();
        $status=Status::where('statusType','state')
            ->get();

        return view('client.edit',compact('client','areas','status'));
    }
}
