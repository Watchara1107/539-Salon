@extends('layouts.master_backend')
@section('content')
    <div class="col-md-4">
       
    </div>
    <div class="card mt-4">
        <h5 class="card-header">ผลงานของร้าน 359 salon</h5>
        <div class="table-responsive text-nowrap">
            <div class="row mb-5">

                @foreach ($profile as $pro)
                <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card h-100">
                    <img class="card-img-top" src="{{ asset($pro->multi_image) }}" alt="Card image cap"  />
                    <div class="card-body">
                     
                      <a href="{{ url('/admin/profile/edit/'.$pro->id) }}" class="btn btn-outline-warning">แก้ไข</a>
                      <a href="{{ url('/admin/profile/delete/'.$pro->id) }}" class="btn btn-outline-danger">ลบ</a>
                    </div>
                  </div>
                </div>
                @endforeach

              </div>
        </div>

@endsection
