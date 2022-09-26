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
    <link rel="stylesheet" href="{{ asset('forntend/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('forntend/assets/css/templatemo-eduwell-style.css')}}">
    <link rel="stylesheet" href="{{ asset('forntend/assets/css/owl.css')}}">
    <link rel="stylesheet" href="{{ asset('forntend/assets/css/lightbox.css')}}">
<!--

TemplateMo 573 EduWell

https://templatemo.com/tm-573-eduwell

-->
  </head>

<body>


  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="{{ url('/') }}" class="logo">
                          <img src="{{ asset('forntend/assets/images/539salonlogo.png') }}" alt="EduWell Template">
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                          <li class="scroll-to-section"><a href="#courses">Services</a></li>
                          <li class="scroll-to-section"><a href="#booking">Queue Booking</a></li>
                          <li class="scroll-to-section"><a href="#contact-section">Contact</a></li>
                          
                          <li><a href="{{ route('login') }}">Login</a></li> 
                          <li><a href="{{ route('register') }}">Register</a></li> 
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
    <!-- ***** Main Banner Area Start ***** -->
    <section class="main-banner" id="top">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="header-text">
                <h6>Welcome to</h6>
                <h2>539<em>Salon</em></h2>
                <div class="main-button-gradient">
                  <div><a href="{{ url('/booking') }}">ระบบจองคิวร้าน 539 Salon</a></div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image">
                <img src="{{ asset('forntend/assets/images/salon.png')}}" alt="">
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ***** Main Banner Area End ***** -->

  @yield('content')

  
        <div class="col-lg-12">
          <ul class="social-icons">
            <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-line"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-tiktok"></i></a></li>
          </ul>
        </div>
        <div class="col-lg-12">
          <p class="copyright">Copyright © 2022 539 Salon All Rights Reserved. 
          
          <br>Design: <a rel="sponsored" href="" target="_blank">Watchara Ketkaew</a>
          
        </div>
      </div>
    </div>
  </section>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('forntend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('forntend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{ asset('forntend/assets/js/isotope.min.js')}}"></script>
    <script src="{{ asset('forntend/assets/js/owl-carousel.js')}}"></script>
    <script src="{{ asset('forntend/assets/js/lightbox.js')}}"></script>
    <script src="{{ asset('forntend/assets/js/tabs.js')}}"></script>
    <script src="{{ asset('forntend/assets/js/video.js')}}"></script>
    <script src="{{ asset('forntend/assets/js/slick-slider.js')}}"></script>
    <script src="{{ asset('forntend/assets/js/custom.js')}}"></script>
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
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
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

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
          e.preventDefault();
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script>
</body>

</html>