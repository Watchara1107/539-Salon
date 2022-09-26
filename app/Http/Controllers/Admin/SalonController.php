<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Salon;
use Illuminate\Http\Request;

class SalonController extends Controller
{
    public function index(){
        $salon = Salon::Paginate(20);
        return view('admin.salon.index',compact('salon'));
    }

    public function create(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255', 
        ],[
            'name.required' => 'กรุณากรอกชื่อช่าง',
            'name.max:255' => 'ท่านกรอกข้อมูลเกิน 255 ตัวอักษร',
        ]);
        $salon = new Salon();
        $salon->name = $request->name;
        $salon->save();
        alert()->success('คุณได้บันทึกข้อมูลเรียบร้อยแล้ว','');
        return redirect()->route('salon.index');
    }

    public function edit($id){
        $salon = Salon::find($id);
        return view('admin.salon.edit',compact('salon'));
    }
    public function update(Request $request, $id){
        $salon = Salon::find($id);
        $salon->name = $request->name;
        $salon->update();
        alert()->success('คุณได้อัพเดทข้อมูลเรียบร้อยแล้ว','');
        return redirect()->route('salon.index');
    }

    public function delete($id){
        $salon = Salon::find($id);
        $salon->delete();
        alert()->success('คุณได้ลบข้อมูลเรียบร้อยแล้ว','');
        return redirect()->route('salon.index');
    }
}
