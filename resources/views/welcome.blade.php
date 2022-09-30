@extends('layouts.master_forntend')
@section('content')
    @include('sweetalert::alert')

    <section class="our-courses" id="courses">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h6>Profile</h6>
                        <h4>ผลงาน <em>ร้าน 539 Salon</em></h4>
                    </div>
                </div>
                <div class="row">
                    @foreach ($profile as $pro)
                    <div class="col-4 mt-4">
                        <div class="card">
                            <img src="{{ asset($pro->multi_image) }}" alt="">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="contact-us" id="booking">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row mt-5">
                        <div class="col-lg-9 shadow p-3 mb-5 bg-body rounded">
                            <div class="section-heading">
                                <h6>Booking</h6>
                                <h4>รายการตรวจสอบคิวรับบริการ<em>ร้าน 365 Salon</em></h4>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ชื่อ-นามสกุล</th>
                                        <th scope="col">วันเดือนปีที่จอง</th>
                                        <th scope="col">เวลาที่จอง</th>
                                        <th scope="col">สถานะคิว</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($booking as $book)
                                        @if ($book->service == 0)
                                            <tr>
                                                <th scope="row">{{ $book->name }}</th>
                                                <td>{{ $book->date }}</td>
                                                <td>{{ $book->time }}</td>
                                                <td>
                                                    <div class="bg-info text-white text-center">{{ $book->status }}</div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <form id="contact" action="{{ route('booking.create') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-heading">
                                    <h6>Booking</h6>
                                    <h4>ระบบจองคิว <em>ร้าน 365 Salon</em></h4>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <input type="name" name="name" id="name" placeholder="ชื่อ-นามสกุลผู้จอง"
                                        autocomplete="on" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <input type="text" name="email" id="อีเมล์" pattern="[^ @]*@[^ @]*"
                                        placeholder="อีเมล์">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <input type="text" name="phone" id="phone" placeholder="เบอร์โทรศัพท์"
                                        required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <input type="date" name="date" id="date" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <input type="time" name="time" id="time" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <select class="form-control" name="salon">
                                        <option value="">เลือกช่าง</option>
                                        @foreach ($salon as $salons)
                                            <option value="{{ $salons->id }}">{{ $salons->name }}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div><br><br><br>
                            <div class="col-lg-12">
                                <fieldset>
                                    <select class="form-control" name="services">
                                        <option value="">เลือกบริการ</option>
                                        @foreach ($service as $services)
                                            <option value="{{ $services->id }}">{{ $services->name }}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                            <br><br><br>
                            <div class="col-lg-12">
                                <fieldset>
                                    <input type="text" name="manu2" id="manu2"
                                        placeholder="อื่นๆที่อยากบอกช่าง เช่นอาการแพ้ต่างๆ เป็นต้น">
                                </fieldset>
                            </div>
                            <br><br><br>

                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="main-gradient-button">จองคิว</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
    </section>

    <section class="contact-us" id="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="map">

                        <!-- You just need to go to Google Maps for your own map point, and copy the embed code from Share -> Embed a map section -->
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d242.27492707522984!2d100.53285891661844!3d13.694277677600258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29f5479e88cbb%3A0xdb092bef016b0307!2z4LmC4Lij4LiH4LmA4Lij4Li14Lii4LiZ4LiB4Lin4LiU4Lin4Li04LiK4LiyIOC5geC4oeC5h-C4gQ!5e0!3m2!1sth!2sth!4v1664016298734!5m2!1sth!2sth"
                            width="100%" height="420" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <div class="row">
                            <div class="col-lg-4 offset-lg-1">
                                <div class="contact-info">
                                    <div class="icon">
                                        <i class="fa-brands fa-line"></i>
                                    </div>
                                    <h4>Line ID</h4>
                                    <a href="https://lin.ee/wky6bJQY"><span> 539 Salon</span></a>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="contact-info">
                                    <div class="icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <h4>Mobile</h4>
                                    <span>082-428-7987</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection
