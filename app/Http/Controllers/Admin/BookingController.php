<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Salon;
use App\Models\Service;
use Illuminate\Http\Request;


class BookingController extends Controller
{
    public function forntbooking(){
        return view('booking')->with("booking",Booking::all())->with("salon",Salon::all())->with("service",Service::all());
    }
    public function index(){
        return view('admin.booking.index')->with("booking",Booking::Paginate(20));
    }
    public function insert(){
        return view('admin.booking.insert')->with("salon",Salon::all())->with("service",Service::all());
    }
    public function create(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'date' => 'required',
            'time' => 'required',
            
        ],[
            'name.required' => 'กรุณากรอกชื่อนามสกุล',
            'name.max:255' => 'ท่านกรอกข้อมูลเกิน 255 ตัวอักษร',
            'phone.required' => 'กรุณากรอกเบอร์โทรศัพท์',
            'phone.max:255' => 'ท่านกรอกข้อมูลเกิน 255 ตัวอักษร',
            'date.required' => 'กรุณาเลือกวันที่จอง',
            'time.required' => 'กรุณาเลือกเวลาที่จอง',
         
        ]);
        $booking = new Booking();
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->date = $request->date;
        $booking->time = $request->time;
        $booking->salon_id = $request->salon;
        $booking->service_id = $request->services;
        $booking->manu2 = $request->manu2;
        $sToken = "RvV4eZ3AOGS6LLWBs2i0aoc3qvFYdJlmGujEESWNu7x";
        $sMessage = "ข้อความจากลูกค้าร้าน\n";
        $sMessage .= "ชื่อ-นามสกุล : " . $request->name . "\n";
        $sMessage .= "เบอร์โทรศัพท์ : " . $request->phone . "\n";
        $sMessage .= "วันที่และเวลาจองคิว : " . $request->date ." "."เวลา ". $request->time. "\n";
        $chOne = curl_init();
        curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($chOne, CURLOPT_POST, 1);
        curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=" . $sMessage);
        $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $sToken . '',);
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($chOne);

        //Result error
        if (curl_error($chOne)) {
            echo 'error:' . curl_error($chOne);
        } else {
            $result_ = json_decode($result, true);
            echo "status : " . $result_['status'];
            echo "message : " . $result_['message'];
        }
        curl_close($chOne);
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
           
        ],[
            'name.required' => 'กรุณากรอกชื่อนามสกุล',
            'name.max:255' => 'ท่านกรอกข้อมูลเกิน 255 ตัวอักษร',
            'phone.required' => 'กรุณากรอกเบอร์โทรศัพท์',
            'phone.max:255' => 'ท่านกรอกข้อมูลเกิน 255 ตัวอักษร',
            'date.required' => 'กรุณาเลือกวันที่จอง',
            'time.required' => 'กรุณาเลือกเวลาที่จอง',
            
        ]);
        $booking = new Booking();
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->date = $request->date;
        $booking->time = $request->time;
        $booking->salon_id = $request->salon;
        $booking->service_id = $request->services;
        $booking->manu2 = $request->manu2;
        $sToken = "RvV4eZ3AOGS6LLWBs2i0aoc3qvFYdJlmGujEESWNu7x";
        $sMessage = "ข้อความจากลูกค้าร้าน\n";
        $sMessage .= "ชื่อ-นามสกุล : " . $request->name . "\n";
        $sMessage .= "เบอร์โทรศัพท์ : " . $request->phone . "\n";
        $sMessage .= "วันที่และเวลาจองคิว : " . $request->date ." "."เวลา ". $request->time. "\n";
        $chOne = curl_init();
        curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($chOne, CURLOPT_POST, 1);
        curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=" . $sMessage);
        $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $sToken . '',);
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($chOne);

        //Result error
        if (curl_error($chOne)) {
            echo 'error:' . curl_error($chOne);
        } else {
            $result_ = json_decode($result, true);
            echo "status : " . $result_['status'];
            echo "message : " . $result_['message'];
        }
        curl_close($chOne);
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
        return view('admin.booking.edit',compact('booking'))->with("salon",Salon::all())->with("service",Service::all());
    }
    public function update(Request $request, $id){
        $booking = Booking::find($id);
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->date = $request->date;
        $booking->time = $request->time;
        $booking->salon_id = $request->salon;
        $booking->service_id = $request->services;
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
