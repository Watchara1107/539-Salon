@extends('layouts.master_backend')
@section('content')
    <div class="col-md-4">
        <a href="{{ route('discount.create') }}" class="btn btn-primary">เพิ่มส่วนลด</a>
    </div>
    <div class="card mt-4">
        <h5 class="card-header">ส่วนลด</h5>
        <div class="row mt-4">
            
            <div class="col-1"></div>
        </div>
        <div class="table-responsive text-nowrap">

            
            <table class="table">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>รหัสส่วนลด</th>
                        <th>ชื่อส่วนลด</th>
                        <th>วันที่ออกส่วนลด</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($discount as $item)
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> 
                            <strong>{{ $discount->firstItem() + $loop->index }}</strong>
                        </td>
                        <td>{{ $item->discount_num }}</td>
                        <td>{{ $item->discount_name }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="{{ url('admin/discount/edit/'.$item->id) }}" class="btn btn-warning">แก้ไข</a>
                            <a href="{{ url('admin/discount/delete/'.$item->id) }}" class="btn btn-danger">ลบ</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="container">
            <div class="row mt-4">
                {{ $discount->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
