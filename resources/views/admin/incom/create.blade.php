@extends('layouts.master_backend')
@section('content')
<div class="text-center">
    <div class="col-xl-12">
        <div class="card mb-4">
          <h5 class="card-header">เพิ่มรายได้ของร้าน</h5>
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
            <form action="{{ route('incom.insert') }}" method="post">
                @csrf
                <div class="mb-3 row">
                    <label for="html5-tel-input" class="col-md-2 col-form-label">บริการ</label>
                    <div class="col-md-10">
                        <select class="form-select" name="service" required>
                          <option value="">เลือกบริการ</option>
                          @foreach($service as $services)
                          <option value="{{$services->id}}">{{$services->name}}</option>
                          @endforeach
                          </select>
                    </div>
                  </div>

                <div class="mb-3 row">
                    <label for="html5-text-input" class="col-md-2 col-form-label">ราคา</label>
                    <div class="col-md-10">
                      <input class="form-control" type="text" name="price"  id="html5-text-input" />
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="html5-tel-input" class="col-md-2 col-form-label">ชื่อช่าง</label>
                    <div class="col-md-10">
                        <select class="form-select" name="salon" required="">
                          <option value="">เลือกช่าง</option>
                          @foreach($salon as $salons)
                          <option value="{{$salons->id}}">{{$salons->name}}</option>
                          @endforeach
                          </select>
                    </div>
                  </div>
             
                  <div class="mb-3 row">
                    <label for="html5-email-input" class="col-md-2 col-form-label">หมายเหตุ</label>
                    <div class="col-md-10">
                      <input class="form-control" type="text" name="comment" id="html5-email-input" />
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