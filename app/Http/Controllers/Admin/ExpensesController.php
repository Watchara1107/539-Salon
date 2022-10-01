<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expenses;
use Image;
use File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function index()
    {
        $expenses = Expenses::paginate('20');
        return view('admin.expenses.index', compact('expenses'));
    }
    public function create()
    {
        return view('admin.expenses.create');
    }
    public function insert(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required|max:255',
                'num' => 'required',
                'price' => 'required',
                'image' => 'mimes:jpg,jpeg,png',
            ],
            [
                'name.required' => 'กรุณาป้อนรายการซื้อ',
                'name.max' => 'ป้อนข้อมูลได้สูงสุด 255 ตัวอักษร',
                'num.required' => 'กรุณาป้อนจำนวนที่ซื้อ',
                'price.required' => 'กรุณาป้อนราคาที่ซื้อ',
                'image.mimes' => 'บันทึกภาพได้เฉพาะไฟล์ jpg,jpeg,png',

            ]
        );
        $expenses = new Expenses();
        $expenses->name = $request->name;
        $expenses->num = $request->num;
        $expenses->price = $request->price;
        $expenses->comment = $request->comment;
        if ($request->hasFile('image')) {
            $filename = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path() . '/backend/upload/expenses/', $filename);
            Image::make(public_path() . '/backend/upload/expenses/' . $filename);
            $expenses->image = $filename;
        } else {
            $expenses->image = 'nopic.jpg';
        }
        $expenses->save();
        alert()->success('คุณได้เพิ่มรายการซื้อเรียบร้อยแล้ว', '');
        return redirect()->route('expenses.index');
    }

    public function edit($id)
    {
        $expenses = Expenses::find($id);
        return view('admin.expenses.edit', compact('expenses'));
    }

    public function update(Request $request, $id)
    {
        if ($request->hasFile('image')) {
            $expenses = Expenses::find($id);
            $expenses->name = $request->name;
            $expenses->num = $request->num;
            $expenses->price = $request->price;
            $expenses->comment = $request->comment;
            if ($expenses->image != 'nopic.jpg') {
                File::delete(public_path() . '/backend/upload/expenses/' . $expenses->image);
            }
            $filename = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path() . '/backend/upload/expenses/', $filename);
            Image::make(public_path() . '/backend/upload/expenses/' . $filename);
            $expenses->image = $filename;
        }
        $expenses->save();
        alert()->success('คุณได้แก้ไขรายการซื้อเรียบร้อยแล้ว', '');
        return redirect()->route('expenses.index');
    }

    public function delete($id)
    {
        $expenses = Expenses::find($id);
        if ($expenses->image != 'nopic.jpg') {
            File::delete(public_path() . '/backend/upload/expenses/' . $expenses->image);
        }
        $expenses->delete();
        alert()->success('คุณได้ลบรายการซื้อเรียบร้อยแล้ว', '');
        return redirect()->route('expenses.index');
    }
}
