<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Incom;
use App\Models\Salon;
use App\Models\Service;
use Illuminate\Http\Request;

class IncomController extends Controller
{
    public function index(){
        $incom = Incom::Paginate('20');
        return view('admin.incom.index',compact('incom'));
    }

    public function create(){
        return view('admin.incom.create')
        ->with("salon", Salon::all())
        ->with("service",Service::all());
    }

    public function insert(Request $request){
        $validated = $request->validate([
            'service' => 'required',
            'salon' => 'required',
            'price' => 'required',
           
        ],[
            'service.required' => 'กรุณาเลือกบริการ',
            'salon.required' => 'กรุณาเลือกช่าง',
            'price.required' => 'กรุณาใส่ราคา',
    
            
        ]);
        $incom = new Incom();
        $incom->service_id = $request->service;
        $incom->salon_id = $request->salon;
        $incom->price = $request->price;
        $incom->comment = $request->comment;
        $incom->save();
        alert()->success('คุณได้บันทึกเรียบร้อยแล้ว','');
        return redirect()->route('incom.index');
    }

    public function edit($id){
        return view('admin.incom.edit')
        ->with("incom",Incom::find($id))
        ->with("salon", Salon::all())
        ->with("service",Service::all());
    }

    public function update(Request $request, $id){
        $incom = Incom::find($id);
        $incom->service_id = $request->service;
        $incom->salon_id = $request->salon;
        $incom->price = $request->price;
        $incom->comment = $request->comment;
        $incom->update();
        alert()->success('คุณได้อัพเดทข้อมูลเรียบร้อยแล้ว','');
        return redirect()->route('incom.index');
    }

    public function delete($id){
        $incom = Incom::find($id);
        $incom->delete();
        alert()->success('คุณได้ลบข้อมูลเรียบร้อยแล้ว','');
        return redirect()->route('incom.index');
    }
}
