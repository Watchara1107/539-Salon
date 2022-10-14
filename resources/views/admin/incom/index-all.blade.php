@extends('layouts.master_backend')
@section('content')
    <div class="col-md-4">
    </div>
    <div class="card mt-4">
        <h5 class="card-header">รายได้ของร้าน</h5>
        <div class="row mt-4">
            <div class="col-9"></div>
            <div class="col mb-4 md-2 xl-2">
                <form action="{{ url('admin/incom/search/') }}" method="get">
                    @csrf
                <input type="date" name="search" class="form-control ">
            </div>
                <div class="col">
                    <input type="submit" class="btn btn-primary" value="ค้นหา">
                </div>
            </form>
            
            <div class="col-1"></div>
        </div>
        <div class="table-responsive text-nowrap">

            
            <table class="table">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อบริการ</th>
                        <th>ราคา</th>
                        <th>รหัสส่วนลด</th>
                        <th>ช่างที่ทำ</th>
                        <th>วันที่ทำ</th>
                        <th>หมายเหตุ</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  @foreach ($in as $item)
                      
                  
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> 
                                <strong>{{ $in->firstItem() + $loop->index }}</strong></td>
                            <td>{{ $item->services->name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->discount }}</td>
                            <td>{{ $item->salon->name }}</td>
                            <td>{{ $item->created_at}}</td>
                            <td>{{ $item->comment }}</td>
                           
                            <td>
                                
                                <a href="{{ asset('admin/incom/edit/'.$item->id) }}" class="btn btn-warning">แก้ไข</a>
                                <a href="{{ asset('admin/incom/delete/'.$item->id) }}" class="btn btn-danger">ลบ</a>

                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-start"><strong>รวมรายได้ทั้งหมด {{number_format($in->sum('price')) }} บาท</strong></td>
                        </tr>
                </tbody>
            </table>
        </div>
        <div class="container">
            <div class="row mt-4">
             {{ $in->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
