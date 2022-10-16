<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index(){
        $discount = Discount::orderBy('created_at','desc')->Paginate('100');
        return view('admin.discount.index',compact('discount'));
    }

    public function create(){
        return view('admin.discount.create');
    }

    public function insert(Request $request){
        $validated = $request->validate([
            'discount_num' => 'required|unique:discounts|max:255',
            'discount_name' => 'required|max:255',
           
            
        ],[
            'discount_num.required' => 'กรุณากรอกรหัสส่วนลด',
            'discount_num.max:255' => 'คุณกรอกข้อมูลเกิน 255 ตัวอักษร',
            'discount_num.unique' => 'รหัสส่วนลดนี้คุณได้ออกไปแล้วกรุณาออกรหัสใหม่',
            'discount_name.required' => 'กรุณากรอกชื่อส่วนลด',
            'discount_name.max:255' => 'คุณกรอกข้อมูลเกิน 255 ตัวอักษร',
        ]);
        $discount = new Discount();
        $discount->discount_num = $request->discount_num;
        $discount->discount_name = $request->discount_name;
        $discount->save();
        alert()->success('คุณได้เพิ่มส่วนลดแล้ว','');
        return redirect()->route('discount.index');
    }

    public function edit($id){
        $discount = Discount::find($id);
        return view('admin.discount.edit',compact('discount'));
    }

    public function update(Request $request,$id){
        $validated = $request->validate([
            'discount_num' => 'required|unique:discounts|max:255',
            'discount_name' => 'required|max:255',
           
            
        ],[
            'discount_num.required' => 'กรุณากรอกรหัสส่วนลด',
            'discount_num.max:255' => 'คุณกรอกข้อมูลเกิน 255 ตัวอักษร',
            'discount_num.unique' => 'รหัสส่วนลดนี้คุณได้ออกไปแล้วกรุณาออกรหัสใหม่',
            'discount_name.required' => 'กรุณากรอกชื่อส่วนลด',
            'discount_name.max:255' => 'คุณกรอกข้อมูลเกิน 255 ตัวอักษร',
        ]);
        $discount = Discount::find($id);
        $discount->discount_num = $request->discount_num;
        $discount->discount_name = $request->discount_name;
        $discount->update();
        alert()->success('คุณได้แก้ไขส่วนลดแล้ว','');
        return redirect()->route('discount.index');
    }

    public function delete($id){
        $discount = Discount::find($id);
        $discount->delete();
        alert()->success('คุณได้ลบส่วนลดแล้ว','');
        return redirect()->route('discount.index');

    }
}
