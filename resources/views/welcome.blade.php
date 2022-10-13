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
                        <div class="col-lg-4 mt-4">
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
                                <h4>รายการตรวจสอบคิวรับบริการ<em>ร้าน 539 Salon</em></h4>
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
                                    <h4>ระบบจองคิว <em>ร้าน 539 Salon</em></h4>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="name" class="form-label">ชื่อผู้จอง</label>
                                    <input type="name" name="name" id="name" autocomplete="on" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="phone" class="form-label">เบอร์โทรศัพท์</label>
                                    <input type="text" name="phone" id="phone" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="date" class="form-label">วันที่จอง</label>
                                    <input type="date" name="date" id="date" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="time" class="form-label">เวลาที่จอง</label>
                                    <input type="time" name="time" id="time" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="salon" class="form-label">เลือกช่าง</label>
                                    <select class="form-control" name="salon" id="salon">
                                        <option value=""></option>
                                        @foreach ($salon as $salons)
                                            <option value="{{ $salons->id }}">{{ $salons->name }}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div><br><br><br><br>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="service" class="form-label">เลือกบริการ</label>
                                    <select class="form-control" name="services" id="service">
                                        <option value=""></option>
                                        @foreach ($service as $services)
                                            <option value="{{ $services->id }}">{{ $services->name }}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                            <br><br><br><br>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="manu2" class="form-label">อื่นๆ</label>
                                    <input type="text" name="manu2" id="manu2"
                                        placeholder="อื่นๆที่อยากบอกช่างหรือใช้มากกว่า 1 บริการ">
                                </fieldset>
                            </div>
                            <br><br><br><br>

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
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62022.359458815146!2d100.49810997910157!3d13.694360600000016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29f0acf5993db%3A0xa1548aca90b8f7ee!2s539Salon!5e0!3m2!1sth!2sth!4v1664626620190!5m2!1sth!2sth"
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
                <div class="fb-customerchat" page_id="110333965172867"></div>
                <script>
                    window.fbAsyncInit = function() {
                        FB.init({
                            appId: '1750517141977071',
                            autoLogAppEvents: true,
                            xfbml: true,
                            version: 'v12.0'
                        });
                    };

                    (function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));
                </script>
            @endsection
