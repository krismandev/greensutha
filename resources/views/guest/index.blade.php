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

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('frontend/css/docs.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/flag-icon.css')}}" rel="stylesheet">

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
                <a href="#selayang_pandang" class="btn btn-primary" style="border-radius: 10px;"><h3 class="font-secondary  font-weight-bold text-uppercase" style="color: #fff;">Get Started</h3> </a> @if($video_banner != null) <a href="{{$video_banner->link_video}}" data-fancybox="gallery" style="margin-left: 10px;"> @else <a href="https://www.youtube.com/watch?v=OpuBatkuuNc" data-fancybox="gallery" style="margin-left: 10px;"> @endif <h2 style="color: #fff;"> <i class="lnr lnr-film-play"></i> </h2> </a>



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
            <span class="caption d-block mb-2 font-secondary font-weight-bold">GreenSUTHA</span>

            <h2 class="site-section-heading text-uppercase text-center font-secondary">{{__('index.selayang_pandang')}}</h2>
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
            <span class="caption d-block mb-2 font-secondary font-weight-bold">{{__('index.kampus_hijau')}}</span>
            <h2 class="site-section-heading text-uppercase text-center font-secondary">UIN Sulthan Thaha Saifuddin Jambi</h2>
          </div>
        </div>
        <div class="row border-responsive">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 border-right" data-aos="fade-up" data-aos-delay="">
            <div class="text-center">
              <span class="lnr lnr-apartment display-4 d-block mb-3 text-primary"></span>
              <h3 class="text-uppercase h4 mb-3">{{__('navbar.green_sutha.penataan')}}</h3>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 border-right" data-aos="fade-up" data-aos-delay="100">
            <div class="text-center">
              <span class="lnr lnr-sun display-4 d-block mb-3 text-primary"></span>
              <h3 class="text-uppercase h4 mb-3">{{__('navbar.green_sutha.energi')}}</h3>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 border-right" data-aos="fade-up" data-aos-delay="200">
            <div class="text-center">
              <span class="lnr lnr-trash display-4 d-block mb-3 text-primary"></span>
              <h3 class="text-uppercase h4 mb-3">{{__('navbar.green_sutha.limbah')}}</h3>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="text-center">
              <span class="lnr lnr-drop display-4 d-block mb-3 text-primary"></span>
              <h3 class="text-uppercase h4 mb-3">{{__('navbar.green_sutha.air')}}</h3>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 border-right" data-aos="fade-up" data-aos-delay="200">
            <div class="text-center">
              <span class="lnr lnr-bus display-4 d-block mb-3 text-primary"></span>
              <h3 class="text-uppercase h4 mb-3">{{__('navbar.green_sutha.transportasi')}}</h3>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 border-right" data-aos="fade-up" data-aos-delay="200">
            <div class="text-center">
              <span class="lnr lnr-book display-4 d-block mb-3 text-primary"></span>
              <h3 class="text-uppercase h4 mb-3">{{__('navbar.green_sutha.pendidikan')}}</h3>
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
            <h2 class="site-section-heading text-uppercase text-center font-secondary">{{__('index.event')}}</h2>
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
                  <h3 class="font-secondary text-uppercase">{{$event->nama_event}}</h3>
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
            <h2 class="site-section-heading text-center text-uppercase">{{__('index.tim')}}</h2>
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
                  <h3 class="font-secondary text-uppercase">{{$tim->user->name}}</h3>
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
            <h2 class="site-section-heading text-center text-uppercase">{{__('index.berita_terbaru')}}</h2>
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
                <p><a href="{{route('showPostUser',$post->slug)}}">{{__('index.baca_selengkapnya')}}</a></p>
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
            <h2 class="site-section-heading text-uppercase text-center font-secondary">{{__('index.foto')}}</h2>
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
            <h2 class="site-section-heading text-uppercase text-center font-secondary">{{__('index.poster')}}</h2>
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
            <h2 class="text-uppercase text-white mb-4" data-aos="fade-up">{{__('index.lebih_dekat')}}</h2>
            <a href="{{route('kontakUser')}}" class="btn btn-bg-primary font-secondary text-uppercase" data-aos="fade-up" data-aos-delay="100">{{__('index.kontak')}}</a>
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
                <h3 class="footer-heading mb-4 text-white">{{__('index.menu_cepat')}}</h3>
                  <ul class="list-unstyled">
                    <li><a href="{{route('home')}}">{{__('navbar.beranda')}}</a></li>
                    <li><a href="{{route('getSelayangPandangUser')}}">{{__('navbar.tentang')}}</a></li>
                    <li><a href="{{route('getPenataanUser')}}">{{__('navbar.green_campus')}}</a></li>
                    <li><a href="{{route('getEventUser')}}">Event</a></li>
                  </ul>
              </div>
              <div class="col-md-6">

                  <ul class="list-unstyled">
                    <li><a href="{{route('getPostsUser')}}">{{__('navbar.berita')}}</a></li>
                    <li><a href="{{route('getFotoUser')}}">{{__('navbar.gallery')}}</a></li>
                    <li><a href="{{route('kontakUser')}}">{{__('navbar.kontak')}}</a></li>
                  </ul>
              </div>
            </div>


          </div>


          <div class="col-md-2">

            <div class="row">
            <div class="col-md-12"><h3 class="footer-heading mb-4 text-white">Sosial Media</h3></div>
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

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="{{asset('frontend/css/docs.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/css/flag-icon.css')}}" rel="stylesheet">


  <script src="{{asset('frontend/js/main.js')}}"></script>
  <script src="{{asset('frontend/js/docs.js')}}"></script>


  </body>
</html>
