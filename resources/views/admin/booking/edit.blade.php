@extends('layouts.master_backend')
@section('content')
    <div class="text-center">
        <div class="col-xl-12">
            <div class="card mb-4">
                <h5 class="card-header">แก้ไขข้อมูลการจองคิว</h5>
                <div class="card-body">
                    <form action="{{ url('/admin/booking/update/' . $booking->id) }}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-2 col-form-label">ชื่อ-นามสกุล</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" value="{{ $booking->name }}"
                                    id="html5-text-input" />
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="html5-tel-input" class="col-md-2 col-form-label">เบอร์โทรศัทพ์</label>
                            <div class="col-md-10">
                                <input class="form-control" type="tel" name="phone" value="{{ $booking->phone }}"
                                    id="html5-tel-input" />
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="html5-date-input" class="col-md-2 col-form-label">วันที่จอง</label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" name="date" value="{{ $booking->date }}"
                                    id="html5-date-input" />
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="html5-time-input" class="col-md-2 col-form-label">เวลาที่จอง</label>
                            <div class="col-md-10">
                                <input class="form-control" type="time" name="time" value="{{ $booking->time }}"
                                    id="html5-time-input" />
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="html5-tel-input" class="col-md-2 col-form-label">รายการจอง</label>
                            <div class="col-md-10">
                                <select class="form-select" name="services">
                                    @foreach ($service as $services)
                                        <option value="{{ $services->id }}"
                                          @if ($services->id == $booking->service_id)
                                          selected
                                          @endif
                                          >{{ $services->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="html5-tel-input" class="col-md-2 col-form-label">อื่นๆ</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="manu2" value="{{ $booking->manu2 }}"
                                    id="html5-tel-input" />
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="html5-tel-input" class="col-md-2 col-form-label">ชื่อช่าง</label>
                            <div class="col-md-10">
                              <select class="form-select" name="salon">
                                @foreach($salon as $salons)
                                <option value="{{$salons->id}}"
                                  @if ($salons->id == $booking->salon_id)
                                  selected
                                          @endif
                                  >{{$salons->name}}</option>
                                @endforeach
                        </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="html5-tel-input" class="col-md-2 col-form-label">สถานะ</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="status" value="{{ $booking->status }}"
                                    id="html5-tel-input" />
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <input type="submit" class="btn btn-primary" value="อัพเดทข้อมูล">
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    @endsection
