<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Image;
use File;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class Profile359salonController extends Controller
{
    public function index()
    {
        $profile = Profile::all();
        return view('admin.profile539salon.index', compact('profile'));
    }
    public function create()
    {
        return view('admin.profile539salon.create');
    }
    public function insert(Request $request)
    {
        $request->validate([
            'multi_image' => 'required',

        ], [
            'multi_image.required' => 'กรุณาเลือกรูปภาพ',
        ]);
        $image = $request->file('multi_image');

        foreach ($image as $multi_image) {
            $name_gen = hexdec(uniqid()) . '.' . $multi_image->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($multi_image)->resize(500, 400)->save('backend/upload/multi/' . $name_gen);
            $save_url = 'backend/upload/multi/' . $name_gen;
            Profile::insert([
                'multi_image' => $save_url,
                'created_at' => Carbon::now()
            ]);
        }
        alert()->success('คุณได้บันทึกเรียบร้อยแล้ว', '');
        return redirect()->route('pro.index');
    }
    public function edit($id)
    {
        $profile = Profile::find($id);
        return view('admin.profile539salon.edit', compact('profile'));
    }
    public function update(Request $request)
    {
        $multi_image_id = $request->id;


        if ($request->file('multi_image')) {
            $image = $request->file('multi_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image)->resize(600, 400)->save('backend/upload/multi/' . $name_gen);
            $save_url = 'backend/upload/multi/' . $name_gen;
            
            Profile::findOrFail($multi_image_id)->update([
                'multi_image' => $save_url,
            ]);
            alert()->success('คุณได้อัพเดทข้อมูลเรียบร้อยแล้ว', '');
            return redirect()->route('pro.index');
        }
    }

    public function delete($id)
    {
        $multi = Profile::findOrFail($id);
        $img = $multi->multi_image;
        unlink($img);
        Profile::findOrFail($id)->delete();

        alert()->success('คุณได้ลบข้อมูลเรียบร้อยแล้ว', '');
        return redirect()->route('pro.index');
    } // End Method 



}
