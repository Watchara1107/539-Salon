<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;


class BookingController extends Controller
{
    public function forntbooking(){
        return view('booking')->with("booking",Booking::all());
    }
    public function index(){
        $booking = Booking::Paginate(20);
        return view('admin.booking.index',compact('booking'));
    }
    public function insert(){
        return view('admin.booking.insert');
    }
    public function create(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'date' => 'required',
            'time' => 'required',
            'beautician' => 'required',
            'manu' => 'required', 
        ],[
            'name.required' => 'กรุณากรอกชื่อนามสกุล',
            'name.max:255' => 'ท่านกรอกข้อมูลเกิน 255 ตัวอักษร',
            'phone.required' => 'กรุณากรอกเบอร์โทรศัพท์',
            'phone.max:255' => 'ท่านกรอกข้อมูลเกิน 255 ตัวอักษร',
            'date.required' => 'กรุณาเลือกวันที่จอง',
            'time.required' => 'กรุณาเลือกเวลาที่จอง',
            'beautician.required' => 'กรุณาเลือกช่างทำผม',
            'manu.required' => 'กรุณาเลือกรายการใช้บริการ',
        ]);
        $booking = new Booking();
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->date = $request->date;
        $booking->time = $request->time;
        $booking->beautician = $request->beautician;
        $booking->manu = $request->manu;
        $booking->manu2 = $request->manu2;
        $booking->save();
        alert()->success('คุณได้จองคิวเรียบร้อยแล้ว','รอช่างรับคิว ทางร้านจะติดกลับผ่านหมายโทรศัพท์ที่ให้ไว้');
        return redirect('/booking');

    }

    public function save(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'date' => 'required',
            'time' => 'required',
            'beautician' => 'required',
            'manu' => 'required', 
        ],[
            'name.required' => 'กรุณากรอกชื่อนามสกุล',
            'name.max:255' => 'ท่านกรอกข้อมูลเกิน 255 ตัวอักษร',
            'phone.required' => 'กรุณากรอกเบอร์โทรศัพท์',
            'phone.max:255' => 'ท่านกรอกข้อมูลเกิน 255 ตัวอักษร',
            'date.required' => 'กรุณาเลือกวันที่จอง',
            'time.required' => 'กรุณาเลือกเวลาที่จอง',
            'beautician.required' => 'กรุณาเลือกช่างทำผม',
            'manu.required' => 'กรุณาเลือกรายการใช้บริการ',
        ]);
        $booking = new Booking();
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->date = $request->date;
        $booking->time = $request->time;
        $booking->beautician = $request->beautician;
        $booking->manu = $request->manu;
        $booking->manu2 = $request->manu2;
        $booking->save();
        alert()->success('คุณได้บันทึกเรียบร้อยแล้ว','');
        return redirect()->route('booking.index');

    }

    public function queue(Request $request, $id){
        $booking = Booking::find($id);
        $booking->status = $request->status;
        alert()->success('คุณได้กดรับคิวลูกค้าแล้ว','');
        $booking->save();
        return redirect()->route('booking.index');
    }

    public function edit($id){
        $booking = Booking::find($id);
        return view('admin.booking.edit',compact('booking'));
    }
    public function update(Request $request, $id){
        $booking = Booking::find($id);
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->date = $request->date;
        $booking->time = $request->time;
        $booking->beautician = $request->beautician;
        $booking->manu = $request->manu;
        $booking->manu2 = $request->manu2;
        $booking->status = $request->status;
        $booking->update();
        alert()->success('คุณได้อัพเดทข้อมูลเรียบร้อยแล้ว','');
        return redirect()->route('booking.index');
    }
    public function delete($id){
        $booking = Booking::find($id);
        $booking->delete();
        alert()->success('คุณได้ลบข้อมูลเรียบร้อยแล้ว','');
        return redirect()->route('booking.index');
    }
    public function open(Request $request, $id){
        $booking = Booking::find($id);
        $booking->service = $request->service;
        alert()->success('ลูกค้ามาใช้บริการแล้ว','');
        $booking->save();
        return redirect()->route('booking.index');
    }
    public function end(Request $request, $id){
        $booking = Booking::find($id);
        $booking->service = $request->service;
        alert()->success('ลูกค้ายังไม่ใช้บริการ','');
        $booking->save();
        return redirect()->route('booking.index');
    }
}
