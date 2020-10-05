<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title>
      @yield('title')
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.fancybox.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="{{asset('frontend/css/aos.css')}}">


    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <style media="screen">
      .gambar-gallery{

        padding: 10px;
        box-shadow: 5px 10px 18px #888888;
        height: 200px;
      }
    </style>
  </head>
  <body>
  <?php
    use App\Banner;
    use App\Kategori;
    $kategoris = Kategori::all();
    $banners = Banner::all();
   ?>

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

  <div class="site-wrap">
    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->


    @include('layouts.navbar')

    <div class="slide-one-item home-slider owl-carousel">
      @foreach($banners as $banner)
      <div class="site-blocks-cover inner-page overlay" style="background-image: url('banner/{{$banner->gambar}}');" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-6 text-center" data-aos="fade">
              <h1 class="font-secondary  font-weight-bold text-uppercase"></h1>
            </div>
          </div>
        </div>
      </div>
      @endforeach


    </div>

    <div class="slant-1"></div>

    @yield('content')



    <div class="py-5 bg-primary">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6 text-center mb-3 mb-md-0">
            <h2 class="text-uppercase text-white mb-4" data-aos="fade-up">Try For Your Next Project</h2>
            <a href="#" class="btn btn-bg-primary font-secondary text-uppercase" data-aos="fade-up" data-aos-delay="100">Contact Us</a>
          </div>
        </div>
      </div>
    </div>




    <footer class="site-footer bg-dark">
      <div class="container">


        <div class="row">
          <div class="col-md-4 mb-4 mb-md-0">
            <h3 class="footer-heading mb-4 text-white">About</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat quos rem ullam, placeat amet.</p>
            <p><a href="#" class="btn btn-primary text-white px-4">Read More</a></p>
          </div>
          <div class="col-md-5 mb-4 mb-md-0 ml-auto">
            <div class="row mb-4">
              <div class="col-md-6">
                <h3 class="footer-heading mb-4 text-white">Quick Menu</h3>
                  <ul class="list-unstyled">
                    <li><a href="#">Beranda</a></li>
                    <li><a href="#">Tentang</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contacts</a></li>
                    <li><a href="#">Privacy</a></li>
                  </ul>
              </div>
              <div class="col-md-6">
                <h3 class="footer-heading mb-4 text-white">Free Templates</h3>
                  <ul class="list-unstyled">
                    <li><a href="#">HTML5 / CSS3</a></li>
                    <li><a href="#">Clean Design</a></li>
                    <li><a href="#">Responsive</a></li>
                    <li><a href="#">Multi Purpose Template</a></li>
                  </ul>
              </div>
            </div>

            <div class="row mb-5">
              <div class="col-md-12">
              <h3 class="footer-heading mb-4 text-white">Stay up to date</h3>
              <form action="#" class="d-flex footer-subscribe">
                <input type="text" class="form-control rounded-0" placeholder="Enter your email">
                <input type="submit" class="btn btn-primary rounded-0" value="Subscribe">
              </form>
            </div>
            </div>
          </div>


          <div class="col-md-2">

            <div class="row">
            <div class="col-md-12"><h3 class="footer-heading mb-4 text-white">Social Icons</h3></div>
              <div class="col-md-12">
                <p>
                  <a href="#" class="pb-2 pr-2 pl-0"><span class="icon-facebook"></span></a>
                  <a href="#" class="p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="p-2"><span class="icon-instagram"></span></a>
                  <a href="#" class="p-2"><span class="icon-vimeo"></span></a>

                </p>
              </div>
          </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>


          </div>

        </div>
      </div>
    </footer>
  </div>

  <script src="{{asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery-ui.js')}}"></script>
  <script src="{{asset('frontend/js/popper.min.js')}}"></script>
  <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.fancybox.min.js')}}"></script>

  <script src="{{asset('frontend/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('frontend/js/aos.js')}}"></script>
  <script src="{{asset('frontend/js/main.js')}}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  </body>
</html>
