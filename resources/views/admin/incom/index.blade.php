@extends('layouts.master_backend')
@section('content')
    <div class="col-md-4">
        <a href="{{ route('incom.create') }}" class="btn btn-primary">เพิ่มรายได้</a>
    </div>
    <div class="card mt-4">
        <h5 class="card-header">รายได้ประจำวันที่ {{ now()->thaidate() }} ของร้าน 539 Salon</h5>
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
                            <td>
                                @if($incoms->discount_id !== null)
                                {{ $incoms->discount->discount_num }}
                                @else
                                ไม่มีส่วนลด
                                @endif
                            </td>
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
                            <td colspan="2" class="text-start"><strong>รวมรายได้ประจำวันที่ {{ now()->thaidate() }} จำนวนเงิน {{number_format($incom->sum('price')) }} บาท</strong></td>
                        </tr>
                </tbody>
            </table>
        </div>
        <div class="container">
            <div class="row mt-4">
             {{ $incom->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
