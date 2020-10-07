<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title>Green Sultan Thaha</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/fonts/icomoon/style.css')}}">
    <link rel="icon" href="{{asset('frontend/images/logo-uin.jpg')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
    <link href="{{asset('assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.fancybox.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="{{asset('frontend/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/aclonica.css')}}">

    <style media="screen">
      .foto{

        padding: 10px;
        box-shadow: 5px 10px 18px #888888;
        height: 200px;
      }

      #link_selayang_pandang:link{
        text-decoration:none;
      }
    </style>
  </head>
  <body>

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
      @if($banners->count() != null)
      @foreach($banners as $banner)
      <div class="site-blocks-cover inner-page overlay" style="background-image: url('banner/{{$banner->gambar}}');" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-6 text-center" data-aos="fade">
                <!-- <a href="#selayang_pandang"><h3 class="font-secondary  font-weight-bold text-uppercase" >Get Started </a> <a href="https://www.youtube.com/watch?v=U7o8jRZPE-A" data-fancybox="gallery"><i class="lnr lnr-film-play" style="color: #fff;"></i></a></h3> -->
                <!-- <h3 style="color: #fff;"> <a href="#selayang_pandang" id="link_selayang_pandang"> Get Start</a> <a href="https://www.youtube.com/watch?v=U7o8jRZPE-A" data-fancybox="gallery"><i class="lnr lnr-film-play" style="color: #fff;"></i></a> </h3> -->
                <!-- <h1 class="font-secondary  font-weight-bold text-uppercase">Get Started</h1> -->
                <a href="#selayang_pandang" class="btn btn-primary" style="border-radius: 10px;"><h3 class="font-secondary  font-weight-bold text-uppercase" style="color: #fff;">Get Started</h3> </a> <a href="https://www.youtube.com/watch?v=U7o8jRZPE-A" data-fancybox="gallery" style="margin-left: 10px;"> <h2 style="color: #fff;"> <i class="lnr lnr-film-play"></i> </h2> </a>



            </div>
          </div>
        </div>
      </div>
      @endforeach
      @endif


    </div>

    <div class="slant-1"></div>
    <div class="site-section first-section" id="selayang_pandang">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12 text-center" data-aos="fade">
            <h2 class="site-section-heading text-uppercase text-center font-secondary">Selayang Pandang</h2>
          </div>
        </div>
        <div class="row content">
          @if($selayang_pandang->count() != null)
          <p class="text-center">{!!$selayang_pandang->selayang_pandang!!}</p >
          @endif
        </div>
      </div>
    </div>
    <div class="site-section first-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12 text-center" data-aos="fade">
            <span class="caption d-block mb-2 font-secondary font-weight-bold">Kampus Hijau</span>
            <h2 class="site-section-heading text-uppercase text-center font-secondary">UIN Sulthan Thaha Saifuddin Jambi</h2>
          </div>
        </div>
        <div class="row border-responsive">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 border-right" data-aos="fade-up" data-aos-delay="">
            <div class="text-center">
              <span class="lnr lnr-apartment display-4 d-block mb-3 text-primary"></span>
              <h3 class="text-uppercase h4 mb-3">Penataan dan Infrastruktur</h3>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 border-right" data-aos="fade-up" data-aos-delay="100">
            <div class="text-center">
              <span class="lnr lnr-sun display-4 d-block mb-3 text-primary"></span>
              <h3 class="text-uppercase h4 mb-3">Energi dan Perubahan Iklim</h3>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 border-right" data-aos="fade-up" data-aos-delay="200">
            <div class="text-center">
              <span class="lnr lnr-trash display-4 d-block mb-3 text-primary"></span>
              <h3 class="text-uppercase h4 mb-3">Limbah</h3>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="text-center">
              <span class="lnr lnr-drop display-4 d-block mb-3 text-primary"></span>
              <h3 class="text-uppercase h4 mb-3">Air</h3>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 border-right" data-aos="fade-up" data-aos-delay="200">
            <div class="text-center">
              <span class="lnr lnr-bus display-4 d-block mb-3 text-primary"></span>
              <h3 class="text-uppercase h4 mb-3">Transportasi</h3>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 border-right" data-aos="fade-up" data-aos-delay="200">
            <div class="text-center">
              <span class="lnr lnr-book display-4 d-block mb-3 text-primary"></span>
              <h3 class="text-uppercase h4 mb-3">Pendidikan dan Penelitian</h3>
            </div>
          </div>
        </div>
      </div>
    </div>



  <div class="site-section ">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <span class="caption d-block mb-2 font-secondary font-weight-bold">GreenSUTHA</span>
            <h2 class="site-section-heading text-uppercase text-center font-secondary">Event</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 block-13 nav-direction-white">
            <div class="nonloop-block-13 owl-carousel">
              @if($events->count() != null)
              @foreach($events as $event)
              <div class="media-image">
                <a href="{{url('events/'.$event->gambar)}}" data-fancybox="gallery"> <img src="{{url('events/'.$event->gambar)}}" alt="Image" class="img-fluid" style="width:100%; height:100%;"></a>
                <div class="media-image-body">
                  <h2 class="font-secondary text-uppercase">{{$event->nama_event}}</h2>
                </div>
              </div>
              @endforeach
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>





    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12 text-center" data-aos="fade">
            <span class="caption d-block mb-2 font-secondary font-weight-bold">GreenSUTHA</span>
            <h2 class="site-section-heading text-center text-uppercase">Tim Pengelola</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 block-13 nav-direction-white">
            <div class="nonloop-block-13 owl-carousel">
              @if($tims->count() != null)
              @foreach($tims as $tim)
              <div class="media-image" style="padding:20px;">
                <img src="{{$tim->getAvatar()}}" alt="Image" class="img-fluid" style="width:100%; height:100%;">
                <div class="media-image-body">
                  <h2 class="font-secondary text-uppercase">{{$tim->user->name}}</h2>
                  <p>
                    <a href="{{$tim->yt}}" target="_blank" class="p-3"><span class="icon-youtube"></span></a>
                    <a href="{{$tim->fb}}" target="_blank" class="p-3"><span class="icon-facebook"></span></a>
                    <a href="{{$tim->twitter}}" target="_blank" class="p-3"><span class="icon-twitter"></span></a>
                    <a href="{{$tim->ig}}" target="_blank" class="p-3"><span class="icon-instagram"></span></a>
                    <a href="{{$tim->li}}" target="_blank" class="p-3"><span class="icon-linkedin"></span></a>
                  </p>
                </div>
              </div>
              @endforeach
              @endif
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12 text-center" data-aos="fade">
            <span class="caption d-block mb-2 font-secondary font-weight-bold">GreenSUTHA</span>
            <h2 class="site-section-heading text-center text-uppercase">Berita terbaru</h2>
          </div>
        </div>
        <div class="row">
          @if($posts->count() != null)
          @foreach($posts as $post)
          <div class="col-md-6 col-lg-4 mb-5" data-aos="" data-aos-delay="100">
            <div class="media-image">
              <a href="{{url('posts/'.$post->gambar)}}"><img src="{{url('posts/'.$post->gambar)}}" alt="Image" class="img-fluid"></a>
              <div class="media-image-body">
                <h2 class="font-secondary text-uppercase"><a href="{{route('showPostUser',$post->slug)}}">{!!Str::limit($post->judul,50)!!}</a></h2>
                <span class="d-block mb-3">Oleh {{$post->user->name}} &mdash; {{date('d M Y',strtotime($post->created_at))}}</span>
                <p>{!!Str::limit($post->konten,60)!!}</p>
                <p><a href="{{route('showPostUser',$post->slug)}}">Baca selengkapnya</a></p>
              </div>
            </div>
          </div>
          @endforeach
          @endif
        </div>
      </div>
    </div>

    <div class="site-section first-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12 text-center" data-aos="fade">
            <span class="caption d-block mb-2 font-secondary font-weight-bold">GreenSUTHA</span>
            <h2 class="site-section-heading text-uppercase text-center font-secondary">Foto Gallery</h2>
          </div>
        </div>
        <div class="row">
          @if($fotos->count() != null)
          @foreach($fotos as $foto)
          <div class="col-md-6 col-lg-3 mb-4 foto" data-aos="fade-up" data-aos-delay="">
            <a href="{{url('galeri/foto/'.$foto->gambar)}}" data-fancybox="gallery"><img src="{{url('galeri/foto/'.$foto->gambar)}}" alt="Image" class="img-fluid" style="height:100%; width:100%;"></a>
          </div>
          @endforeach
          @endif
        </div>
      </div>
    </div>

    <div class="site-section first-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12 text-center" data-aos="fade">
            <span class="caption d-block mb-2 font-secondary font-weight-bold">GreenSUTHA</span>
            <h2 class="site-section-heading text-uppercase text-center font-secondary">Poster</h2>
          </div>
        </div>
        <div class="row">
          @if($posters->count() != null)
          @foreach($posters as $poster)
          <div class="col-md-6 col-lg-3 mb-4 poster" data-aos="fade-up" data-aos-delay="">
            <a href="{{url('galeri/poster/'.$poster->gambar)}}" data-fancybox="gallery"><img src="{{url('galeri/poster/'.$poster->gambar)}}" alt="Image" class="img-fluid" style="height:100%; width:100%;"></a>
          </div>
          @endforeach
          @endif
        </div>
      </div>
    </div>



    <div class="py-5 bg-primary">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6 text-center mb-3 mb-md-0">
            <h2 class="text-uppercase text-white mb-4" data-aos="fade-up">Lebih dekat dengan kami</h2>
            <a href="{{route('kontakUser')}}" class="btn btn-bg-primary font-secondary text-uppercase" data-aos="fade-up" data-aos-delay="100">Kontak kami</a>
          </div>
        </div>
      </div>
    </div>




    <footer class="site-footer bg-dark">
      <div class="container">


        <div class="row">

          <div class="col-md-5 mb-4 mb-md-0 ml-auto">
            <div class="row mb-4">
              <div class="col-md-6">
                <h3 class="footer-heading mb-4 text-white">Menu Cepat</h3>
                  <ul class="list-unstyled">
                    <li><a href="#">Beranda</a></li>
                    <li><a href="#">Tentang</a></li>
                    <li><a href="#">Green Sutha</a></li>
                    <li><a href="#">Event</a></li>
                  </ul>
              </div>
              <div class="col-md-6">

                  <ul class="list-unstyled">
                    <li><a href="#">Berita</a></li>
                    <li><a href="#">Gallery</a></li>
                    <li><a href="#">Kontak</a></li>
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
  <script src="{{asset('assets/vendor/venobox/venobox.min.js')}}"></script>

  <script src="{{asset('frontend/js/jquery.fancybox.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('frontend/js/aos.js')}}"></script>

  <script src="{{asset('frontend/js/main.js')}}"></script>


  </body>
</html>
