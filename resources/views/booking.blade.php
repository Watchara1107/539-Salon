<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>539 Salon</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('forntend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('forntend/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('forntend/assets/css/templatemo-eduwell-style.css') }}">
    <link rel="stylesheet" href="{{ asset('forntend/assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('forntend/assets/css/lightbox.css') }}">
    <!--

TemplateMo 573 EduWell

https://templatemo.com/tm-573-eduwell

-->
</head>

<body>

    @include('sweetalert::alert')
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{ url('/') }}" class="logo">
                            <img src="{{ asset('forntend/assets/images/539salonlogo1.png') }}" alt="EduWell Template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->


                        <ul class="nav">
                            <li><a href="{{ url('/') }}">Home</a></li>
                        </ul>

                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <section class="contact-us" id="booking">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row mt-5">
                        <div class="col-lg-9 shadow p-3 mb-5 bg-body rounded">
                            <div class="section-heading">
                                <h6>Service Queue Checklist</h6>
                                <h4>รายการตรวจสอบคิวรับบริการ<em>ร้าน 539 Salon</em></h4>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ชื่อผู้จอง (Name)</th>
                                        <th scope="col">วันที่จอง (Date)</th>
                                        <th scope="col">เวลาที่จอง (Time)</th>
                                        <th scope="col">สถานะคิว (Status)</th>
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
                                                    <div class="bg-info text-white text-center">{{ $book->status }}
                                                    </div>
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
                                    <label for="name" class="form-label">ชื่อผู้จอง (Name)</label>
                                    <input type="name" name="name" id="name" autocomplete="on" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="phone" class="form-label">เบอร์โทรศัพท์ (Phone)</label>
                                    <input type="text" name="phone" id="phone" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="date" class="form-label">วันที่จอง (Date)</label>
                                    <input type="date" name="date" id="date" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="time" class="form-label">เวลาที่จอง (Time)</label>
                                    <input type="time" name="time" id="time" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="salon" class="form-label">เลือกช่าง (Beautician)</label>
                                    <select class="form-control" name="salon" id="salon">
                                        <option value=""></option>
                                         
                                        @foreach ($salon as $salons)
                                        @if ($salons->status == 0)
                                            <option value="{{ $salons->id }}">{{ $salons->name }}</option>                               @endif
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div><br><br><br><br>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="service" class="form-label">เลือกบริการ (Service)</label>
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
                                    <label for="manu2" class="form-label">อื่นๆ (Another)</label>
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

                <div class="col-lg-12">
                    <ul class="social-icons">
                        <li><a href="https://www.facebook.com/539salon"><i class="fa-brands fa-facebook"></i></a></li>
                        <li><a href="https://lin.ee/wky6bJQY"><i class="fa-brands fa-line"></i></a></li>
                        {{-- <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-tiktok"></i></a></li> --}}
                    </ul>
                </div>
                <div class="col-lg-12">
                    <p class="copyright">Copyright © 2022 539 Salon All Rights Reserved. <a href="{{ route('login') }}">Login</a>
                      {{-- <a href="{{ route('register') }}">Register</a> --}}
            
                        <br>Design: <a rel="sponsored" href="" target="_blank">Watchara Ketkaew</a>
                  
            

                </div>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('forntend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('forntend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('forntend/assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('forntend/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('forntend/assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('forntend/assets/js/tabs.js') }}"></script>
    <script src="{{ asset('forntend/assets/js/video.js') }}"></script>
    <script src="{{ asset('forntend/assets/js/slick-slider.js') }}"></script>
    <script src="{{ asset('forntend/assets/js/custom.js') }}"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
            var
                direction = section.replace(/#/, ''),
                reqSection = $('.section').filter('[data-section="' + direction + '"]'),
                reqSectionPos = reqSection.offset().top - 0;

            if (isAnimate) {
                $('body, html').animate({
                        scrollTop: reqSectionPos
                    },
                    800);
            } else {
                $('body, html').scrollTop(reqSectionPos);
            }

        };

        var checkSection = function checkSection() {
            $('.section').each(function() {
                var
                    $this = $(this),
                    topEdge = $this.offset().top - 80,
                    bottomEdge = topEdge + $this.height(),
                    wScroll = $(window).scrollTop();
                if (topEdge < wScroll && bottomEdge > wScroll) {
                    var
                        currentId = $this.data('section'),
                        reqLink = $('a').filter('[href*=\\#' + currentId + ']');
                    reqLink.closest('li').addClass('active').
                    siblings().removeClass('active');
                }
            });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function(e) {
            e.preventDefault();
            showSection($(this).attr('href'), true);
        });

        $(window).scroll(function() {
            checkSection();
        });
    </script>
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
</body>

</html>
