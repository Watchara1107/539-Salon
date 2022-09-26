@extends('layouts.master_backend')
@section('content')
<div class="text-center">
    <div class="col-xl-12">
        <div class="card mb-4">
          <h5 class="card-header">เพิ่มข้อมูลการจองคิว</h5>
          <div class="card-body">
            <div class="row mt-2">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </div>
            <form action="{{ route('booking.save') }}" method="post">
                @csrf
                <div class="mb-3 row">
                    <label for="html5-text-input" class="col-md-2 col-form-label">ชื่อ-นามสกุล</label>
                    <div class="col-md-10">
                      <input class="form-control" type="text" name="name"  id="html5-text-input" />
                    </div>
                  </div>
             
                  <div class="mb-3 row">
                    <label for="html5-email-input" class="col-md-2 col-form-label">อีเมล์</label>
                    <div class="col-md-10">
                      <input class="form-control" type="text" name="email" id="html5-email-input" />
                    </div>
                  </div>
      
                  <div class="mb-3 row">
                    <label for="html5-tel-input" class="col-md-2 col-form-label">เบอร์โทรศัทพ์</label>
                    <div class="col-md-10">
                      <input class="form-control" type="tel" name="phone"  id="html5-tel-input" />
                    </div>
                  </div>
      
                  <div class="mb-3 row">
                    <label for="html5-date-input" class="col-md-2 col-form-label">วันที่จอง</label>
                    <div class="col-md-10">
                      <input class="form-control" type="date" name="date"  id="html5-date-input" />
                    </div>
                  </div>
      
                  <div class="mb-3 row">
                    <label for="html5-time-input" class="col-md-2 col-form-label">เวลาที่จอง</label>
                    <div class="col-md-10">
                      <input class="form-control" type="time" name="time" id="html5-time-input" />
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="html5-tel-input" class="col-md-2 col-form-label">รายการจอง</label>
                    <div class="col-md-10">
                        <select class="form-select" name="manu" required>
                            <option selected>เลือกรายการบริการ</option>
                            <option value="ตัดผม">ตัดผม</option>
                            <option value="ดัดผม">ดัดผม</option>
                            <option value="ยืดผม">ยืดผม</option>
                            <option value="ทำสีผม">ทำสีผม</option>
                            <option value="สระไดร์">สระไดร์</option>
                          </select>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="html5-tel-input" class="col-md-2 col-form-label">อื่นๆ</label>
                    <div class="col-md-10">
                      <input class="form-control" type="text" name="manu2"  id="html5-tel-input" />
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="html5-tel-input" class="col-md-2 col-form-label">เลือกช่าง</label>
                    <div class="col-md-10">
                        <select class="form-select" name="beautician" required="">
                            <option selected>เลือกช่าง</option>
                            <option value="ช่างบิ๊ก">ช่างบิ๊ก</option>
                          </select>
                    </div>
                  </div>

                 

                  <div class="row mt-4">
                    <div class="col-12">
                        <input type="submit" class="btn btn-primary" value="บันทึกข้อมูล">
                    </div>
                  </div>

            </form>

          </div>
        </div>
</div>

  
@endsection