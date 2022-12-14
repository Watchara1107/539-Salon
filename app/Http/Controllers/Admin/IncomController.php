<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Incom;
use App\Models\Salon;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class IncomController extends Controller
{
    public function index(){
        $incom = Incom::whereDate('created_at', Carbon::today())->Paginate('20');
        return view('admin.incom.index',compact('incom'));
    }

    public function indexall(){
        $in = Incom::orderBy('created_at','desc')->Paginate('100');
        return view('admin.incom.index-all',compact('in'));
    }

    public function create(){
        return view('admin.incom.create')
        ->with("salon", Salon::all())
        ->with("discount", Discount::all())
        ->with("service",Service::all());
    }

    public function insert(Request $request){
        $validated = $request->validate([
            'service' => 'required',
            'salon' => 'required',
            'price' => 'required',
            'discount_id' => 'unique:incoms|nullable',
           
        ],[
            'service.required' => 'กรุณาเลือกบริการ',
            'salon.required' => 'กรุณาเลือกช่าง',
            'price.required' => 'กรุณาใส่ราคา',
            'discount_id.unique' => 'รหัสส่วนลดนี้ถูกใช้ไปแล้ว',
    
            
        ]);
        $incom = new Incom();
        $incom->service_id = $request->service;
        $incom->salon_id = $request->salon;
        $incom->price = $request->price;
        $incom->discount_id = $request->discount_id;
        $incom->comment = $request->comment;
        $incom->save();
        alert()->success('คุณได้บันทึกเรียบร้อยแล้ว','');
        return redirect()->route('incom.index');
    }

    public function edit($id){
        return view('admin.incom.edit')
        ->with("incom",Incom::find($id))
        ->with("salon", Salon::all())
        ->with("discount", Discount::all())
        ->with("service",Service::all());
    }

    public function update(Request $request, $id){
        $incom = Incom::find($id);
        $incom->service_id = $request->service;
        $incom->salon_id = $request->salon;
        $incom->price = $request->price;
        $incom->discount_id = $request->discount_id;
        $incom->comment = $request->comment;
        $incom->update();
        alert()->success('คุณได้อัพเดทข้อมูลเรียบร้อยแล้ว','');
        return redirect()->route('incom.index.all');
    }

    public function delete($id){
        $incom = Incom::find($id);
        $incom->delete();
        alert()->success('คุณได้ลบข้อมูลเรียบร้อยแล้ว','');
        return redirect()->route('incom.index');
    }

    public function searchincom(Request $request){
        $search = $request->search;
        $incom = Incom::where('created_at',"LIKE","%{$search}%")->paginate(50);
        return view('admin.incom.search')->with("incom",$incom);
    }
}
