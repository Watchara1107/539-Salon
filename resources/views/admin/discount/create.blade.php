@extends('layouts.master_backend')
@section('content')
<div class="text-center">
    <div class="col-xl-12">
        <div class="card mb-4">
          <h5 class="card-header">เพิ่มส่วนลด</h5>
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
            <form action="{{ route('discount.insert') }}" method="post">
                @csrf
            
                <div class="mb-3 row">
                    <label for="html5-text-input" class="col-md-2 col-form-label">รหัสส่วนลด</label>
                    <div class="col-md-10">
                      <input class="form-control" type="text" name="discount_num"  id="html5-text-input" />
                    </div>
                  </div>

                <div class="mb-3 row">
                    <label for="html5-text-input" class="col-md-2 col-form-label">ชื่อส่วนลด</label>
                    <div class="col-md-10">
                      <input class="form-control" type="text" name="discount_name"  id="html5-text-input" />
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