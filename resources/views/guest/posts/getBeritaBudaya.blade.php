<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Kategori : {{$ktg->nama_kategori}}</title>
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


    <style>

      @font-face {
      font-family: aclonica;
      src: url(frontend/fonts/Aclonica.ttf);
      }
      .site-logo{
        font-family: aclonica;
      }
    </style>

    <div class="site-navbar-wrap js-site-navbar" style="background-color: #71bc42;">

      <div class="container">
        <div class="site-navbar" style="background-color: #71bc42;">
          <div class="row align-items-center">
            <div class="col-2">
              <h2 class="mb-0 site-logo"><a href="{{route('home')}}" class="font-weight-bold">GreenSUTHA</a></h2>

              <!-- <a href="#"> <i class="lnr lnr-flag"></i> </a> -->
            </div>
            <div class="col-10">
              <nav class="site-navigation text-right" role="navigation">
                <div class="container">
                  <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                  <ul class="site-menu js-clone-nav d-none d-lg-block">
                    <li class=""><a href="{{route('home')}}">{{__('navbar.beranda')}}</a></li>
                    <li class="has-children">
                      <a href="#">{{__('navbar.tentang')}}</a>
                      <ul class="dropdown arrow-top">
                        <li><a href="{{route('getSelayangPandangUser')}}">{{__('navbar.tentang_green_sutha.selayang_pandang')}}</a></li>
                        <li><a href="{{route('getTimUser')}}">{{__('navbar.tentang_green_sutha.tim')}}</a></li>
                        <li><a href="{{route('getMaknaLogoUser')}}">{{__('navbar.tentang_green_sutha.makna_logo')}}</a></li>
                        <li><a href="{{route('getMitraUser')}}">{{__('navbar.tentang_green_sutha.mitra')}}</a></li>
                      </ul>
                    </li>
                    <li class="has-children">
                      <a href="#">{{__('navbar.green_campus')}}</a>
                      <ul class="dropdown arrow-top">
                        <li><a href="{{route('getPenataanUser')}}">{{__('navbar.green_sutha.penataan')}}</a></li>
                        <li><a href="{{route('getEnergiUser')}}">{{__('navbar.green_sutha.energi')}}</a></li>
                        <li><a href="{{route('getLimbahUser')}}">{{__('navbar.green_sutha.limbah')}}</a></li>
                        <li><a href="{{route('getAirUser')}}">{{__('navbar.green_sutha.air')}}</a></li>
                        <li><a href="{{route('getTransportasiUser')}}">{{__('navbar.green_sutha.transportasi')}}</a></li>
                        <li><a href="{{route('getPendidikanUser')}}">{{__('navbar.green_sutha.pendidikan')}}</a></li>
                      </ul>
                    </li>
                    <li class="has-children">
                      <a href="#">Event</a>
                      <ul class="dropdown arrow-top">
                        <li><a href="{{route('getEnvironmentUser')}}">{{__('navbar.event.environment')}}</a></li>
                        <li><a href="{{route('getStudentUser')}}">{{__('navbar.event.student')}}</a></li>

                      </ul>
                    </li>
                    <li class="has-children">
                      <a href="{{route('getPostsUser')}}">{{__('navbar.berita')}}</a>
                      <ul class="dropdown arrow-top">
                        <li><a href="{{route('getBeritaLingkungan')}}">{{__('navbar.kategori.lingkungan')}}</a></li>
                        <li><a href="{{route('getBeritaIslam')}}">{{__('navbar.kategori.islam')}}</a></li>
                        <li><a href="{{route('getBeritaSosial')}}">{{__('navbar.kategori.sosial')}}</a></li>
                        <li><a href="{{route('getBeritaPendidikan')}}">{{__('navbar.kategori.pendidikan')}}</a></li>
                        <li><a href="{{route('getBeritaBudaya')}}">{{__('navbar.kategori.budaya')}}</a></li>
                        <li><a href="{{route('getBeritaEkonomi')}}">{{__('navbar.kategori.ekonomi')}}</a></li>
                        <li><a href="{{route('getBeritaSains')}}">{{__('navbar.kategori.sains')}}</a></li>
                      </ul>
                    </li>
                    <li class="has-children">
                      <a href="#">{{__('navbar.gallery')}}</a>
                      <ul class="dropdown arrow-top">
                        <li><a href="{{route('getFotoUser')}}">{{__('navbar.gallery_isi.foto')}}</a></li>
                        <li><a href="{{route('getPosterUser')}}">{{__('navbar.gallery_isi.poster')}}</a></li>
                      </ul>
                    </li>
                    <li class="" ><a href="{{route('kontakUser')}}">{{__('navbar.kontak')}}</a></li>
                    <li class="has-children">
                      <a href="#"> {{__('navbar.switch_language')}} </a>
                      <ul class="dropdown arrow-top">
                        <li><a href="{{ route('localization.switch', 'en') }}" class="{{ app()->getLocale() == 'en' ? 'active' : '' }}">English</a></li>
                        <li><a href="{{ route('localization.switch', 'id') }}" class="{{ app()->getLocale() == 'id' ? 'active' : '' }}">Indonesia</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="slant-1"></div>



    <div class="site-section first-section">
      <div class="container">
        <div class="col-md-12 text-center aos-init aos-animate" data-aos="fade">
          <span class="caption d-block mb-2 font-secondary font-weight-bold">GreenSutha</span>
          <h2 class="site-section-heading text-uppercase text-center font-secondary">{{__('navbar.kategori.budaya')}}</h2>
        </div>
        <div class="row">
          <div class="col-md-8 blog-content">
            <div class="row mb-5">
              @foreach($posts as $post)
              <div class="col-md-6 col-lg-6 mb-5">
                <div class="media-image">
                  <a href="#"><img src="{{url('posts/'.$post->gambar)}}" alt="Image" class="img-fluid"></a>
                  <div class="media-image-body">
                    <h2 class="font-secondary text-uppercase"><a href="{{route('showPostUser',$post->slug)}}">{!!Str::limit($post->judul,50)!!}</a></h2>
                    <span class="d-block mb-3">Oleh {{$post->user->name}} &mdash; {{date('d M Y',strtotime($post->created_at))}}</span>
                    <p>{!!Str::limit($post->konten,60)!!}</p>
                    <p><a href="{{route('showPostUser',$post->slug)}}">Baca selengkapnya</a></p>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <div class="">
              {{$posts->render()}}
            </div>
          </div>
          <div class="col-md-4 sidebar">
            <div class="sidebar-box">
              <div class="categories">
                <h3 class="text-uppercase">Kategori</h3>
                <li><a href="{{route('getBeritaLingkungan')}}">{{__('navbar.kategori.lingkungan')}}</a></li>
                <li><a href="{{route('getBeritaIslam')}}">{{__('navbar.kategori.islam')}}</a></li>
                <li><a href="{{route('getBeritaSosial')}}">{{__('navbar.kategori.sosial')}}</a></li>
                <li><a href="{{route('getBeritaPendidikan')}}">{{__('navbar.kategori.pendidikan')}}</a></li>
                <li><a href="{{route('getBeritaBudaya')}}">{{__('navbar.kategori.budaya')}}</a></li>
                <li><a href="{{route('getBeritaEkonomi')}}">{{__('navbar.kategori.ekonomi')}}</a></li>
                <li><a href="{{route('getBeritaSains')}}">{{__('navbar.kategori.sains')}}</a></li>
              </div>
            </div>
            <!-- <div class="sidebar-box">
              <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
              <h3 class="text-uppercase">About The Author</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
              <p><a href="#" class="btn btn-primary text-white">Read More</a></p>
            </div>

            <div class="sidebar-box">
              <h3 class="text-uppercase">Paragraph</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
            </div> -->
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
                    <li><a href="{{route('getEnvironmentUser')}}">Event</a></li>
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
  <script src="{{asset('frontend/js/jquery.fancybox.min.js')}}"></script>

  <script src="{{asset('frontend/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('frontend/js/aos.js')}}"></script>

  <script src="{{asset('frontend/js/main.js')}}"></script>



  </body>
</html>
