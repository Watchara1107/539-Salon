@extends('layouts.master_backend')
@section('content')
<div class="col-md-4">
    <a href="{{ route('expenses.create') }}" class="btn btn-primary">เพิ่มรายจ่าย</a>
</div>
    <div class="card mt-4">
        <h5 class="card-header">รายจ่ายของร้าน</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>รายการ</th>
                        <th>จำนวน</th>
                        <th>ราคา</th>
                        {{-- <th>รูปภาพ</th> --}}
                        <th>วันที่จ่าย</th>
                        <th>หมายเหตุ</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  @foreach ($expenses as $item)
                      
                  
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                            
                                <strong>{{ $expenses->firstItem() + $loop->index }}</strong></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->num }}</td>
                            <td>{{ $item->price }}</td>
                            {{-- <td> <img src="{{ asset('backend/upload/expenses/'.$item->image) }}" width="100px" height="100px"> </td> --}}
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->comment }}</td>
                            
                            <td>
                                
                                <a href="{{ url('admin/expenses/edit/'.$item->id) }}" class="btn btn-warning">แก้ไข</a>
                                <a href="{{ url('admin/expenses/delete/'.$item->id) }}" class="btn btn-danger">ลบ</a>

                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
        <div class="container">
            <div class="row mt-4">
                {{ $expenses->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
