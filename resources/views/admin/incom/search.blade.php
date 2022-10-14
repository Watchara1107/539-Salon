@extends('layouts.master_backend')
@section('content')
    <div class="col-md-4">
    </div>
    <div class="card mt-4">
        <h5 class="card-header">รายได้ประจำวันของร้าน 539 Salon</h5>
        <div class="row mt-4">
            <div class="col-9"></div>
            <div class="col mb-4 md-2 xl-2">
                <form action="{{ url('admin/incom/search/') }}" method="get">
                    @csrf
                <input type="date" name="search" class="form-control">
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
                  @foreach ($incom as $incoms)
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> 
                                <strong>{{ $incom->firstItem() + $loop->index }}</strong></td>
                            <td>{{ $incoms->services->name }}</td>
                            <td>{{ $incoms->price }}</td>
                            <td>{{ $incoms->discount }}</td>
                            <td>{{ $incoms->salon->name }}</td>
                            <td>{{ $incoms->created_at}}</td>
                            <td>{{ $incoms->comment }}</td>
                           
                            <td>
                                
                                <a href="{{ asset('admin/incom/edit/'.$incoms->id) }}" class="btn btn-warning">แก้ไข</a>
                                <a href="{{ asset('admin/incom/delete/'.$incoms->id) }}" class="btn btn-danger">ลบ</a>

                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td colspan="2" class="text-start"><strong>รวมรายได้ประจำวัน {{number_format($incom->sum('price')) }} บาท</strong></td>
                        </tr>
                </tbody>
            </table>
        </div>
    
    </div>
@endsection
