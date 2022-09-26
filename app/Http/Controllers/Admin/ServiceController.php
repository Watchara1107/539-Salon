<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        $service = Service::Paginate(20);
        return view('admin.service.index',compact('service'));
    }
    public function create(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255', 
        ],[
            'name.required' => 'กรุณากรอกรายการบริการ',
            'name.max:255' => 'ท่านกรอกข้อมูลเกิน 255 ตัวอักษร',
        ]);
        $service = new Service();
        $service->name = $request->name;
        $service->save();
        alert()->success('คุณได้บันทึกข้อมูลเรียบร้อยแล้ว','');
        return redirect()->route('service.index');
    }

    public function edit($id){
        $service = Service::find($id);
        return view('admin.service.edit',compact('service'));
    }
    public function update(Request $request, $id){
        $service = service::find($id);
        $service->name = $request->name;
        $service->update();
        alert()->success('คุณได้อัพเดทข้อมูลเรียบร้อยแล้ว','');
        return redirect()->route('service.index');
    }

    public function delete($id){
        $service = service::find($id);
        $service->delete();
        alert()->success('คุณได้ลบข้อมูลเรียบร้อยแล้ว','');
        return redirect()->route('service.index');
    }
}

