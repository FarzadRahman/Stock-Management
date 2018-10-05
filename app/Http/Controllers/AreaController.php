<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;
use Session;
class AreaController extends Controller
{
    public function index(){
        $areas=Area::get();
        return view('area.index',compact('areas'));
    }

    public function insert(Request $r){
        $r->validate([
            'areaName' => 'required|max:50|unique:area,areaName',
        ]);
        $area=new Area();
        $area->areaName=$r->areaName;
        $area->save();
        Session::flash('message', 'Area Added Successfully!');
        return redirect()->route('area.index');
    }
    public function edit(Request $r){
        $area=Area::findOrFail($r->id);

        return view('area.edit',compact('area'));

    }
    public function update(Request $r){
        $r->validate([
            'areaName' => 'required|max:50|unique:area,areaName,'.$r->id.',areaId',
        ]);
        $area=Area::findOrFail($r->id);
        $area->areaName=$r->areaName;
        $area->save();
        Session::flash('message', 'Area Added Successfully!');
        return redirect()->route('area.index');
    }
}
