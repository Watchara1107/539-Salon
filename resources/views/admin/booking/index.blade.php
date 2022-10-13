@extends('layouts.master_backend')
@section('content')
    <div class="col-md-4">
        <a href="{{ route('booking.insert') }}" class="btn btn-primary">เพิ่มคิวบริการ</a>
    </div>
    <div class="card mt-4">
        <h5 class="card-header">รายการ Booking</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>เบอร์โทรศัพท์</th>
                        <th>วันที่จอง</th>
                        <th>เวลาที่จอง</th>
                        <th>รายการจอง</th>
                        <th>ชื่อช่าง</th>
                        <th>หมายเหตุ</th>
                        <th>สถานะ</th>
                        <th>ใช้บริการแล้ว</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($booking as $book)
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                <strong>{{ $booking->firstItem() + $loop->index }}</strong></td>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->phone }}</td>
                            <td>{{ $book->date }}</td>
                            <td>{{ $book->time }}</td>
                            <td>{{ $book->services->name }} </td>
                            <td>{{ $book->salon->name }}</td>
                            <td>{{ $book->manu2 }}</td>
                            <td><span class="badge bg-label-primary me-1">{{ $book->status }}</span></td>
                            <td>
                                @if ($book->service == 0)
                                    <form action="{{ url('/admin/booking/open/'.$book->id) }}" method="post">
                                      @csrf
                                      <button type="submit" class="btn btn-danger" name="service" value = "1">ยังไม่ใช้บริการ</button>
                                    </form>
                                @elseif ( $book->service == 1)
                                      <form action="{{ url('/admin/booking/end/'.$book->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-success" name="service" value = "0">ใช้บริการแล้ว</button>
                                      </form>
                                @endif
                            </td>
                            <td>
                                <form action="{{ url('/admin/booking/queue/' . $book->id) }}" method="post">
                                    @csrf
                                    <input class="btn btn-info" type="submit" name="status" value="รับคิว"></input>
                                    <input class="btn btn-primary" type="submit" name="status" value="กำลังใช้บริการ"></input>
                                    <input class="btn btn-success" type="submit" name="status" value="ทำเสร็จแล้ว"></input>
                                </form>
                                <a href="{{ url('/admin/booking/edit/' . $book->id) }}" class="btn btn-warning">แก้ไข</a>
                                <a href="{{ url('/admin/booking/delete/' . $book->id) }}" class="btn btn-danger">ลบ</a>


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="container">
            <div class="row mt-4">
                {{ $booking->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
