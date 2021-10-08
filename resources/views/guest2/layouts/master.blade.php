<?php
use App\Banner;
use App\Visitor;
$banners = Banner::inRandomOrder()->get();

$ip      = $_SERVER['REMOTE_ADDR']; 
$tanggal = date('Y-m-d');
// dd($ip);

$visitToday = Visitor::where('ip',$ip)->where('tanggal',$tanggal)->first();
if ($visitToday == null) {
    $newVisitor = Visitor::create([
        'ip' => $ip,
        'tanggal' => $tanggal
    ]);
}

$countVisitorsToday = Visitor::where('tanggal',$tanggal)->count();
$totalVisitors = Visitor::distinct()->count('tanggal');
// dd($totalVisitors);

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- For Window Tab Color -->
		<!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#151515">
		<!-- Windows Phone -->
		<meta name="msapplication-navbutton-color" content="#151515">
		<!-- iOS Safari -->
		<meta name="apple-mobile-web-app-status-bar-style" content="#151515">
		<title>@yield('title')</title>
		<!-- Favicon -->
		<link rel="icon" type="image/png" sizes="56x56" href="{{asset('frontend2/images/fav-icon/icon.png')}}">
		<!-- Main style sheet -->
		<link rel="stylesheet" type="text/css" href="{{asset('frontend2/css/style.css')}}">
		<!-- responsive style sheet -->
		<link rel="stylesheet" type="text/css" href="{{asset('frontend2/css/responsive.css')}}">
		<!-- Theme-Color css -->
		<link rel="stylesheet" id="jssDefault" href="{{asset('frontend2/css/color.css')}}">
        <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
        <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="fc76350e-9df8-4830-9555-0f2b365adf94";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>

        @yield('header')
		<!-- Fix Internet Explorer ______________________________________-->
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="{{asset('frontend2/vendor/html5shiv.js')}}"></script>
			<script src="{{asset('frontend2/vendor/respond.js')}}"></script>
		<![endif]-->
	</head>

	<body>
		<div class="main-page-wrapper">

			<!-- ===================================================
				Loading Transition
			==================================================== -->
			{{-- <div id="loader-wrapper">
				<div id="loader"></div>
			</div> --}}

			<!-- ==================== Style Switcher ==================== -->
			<div class="switcher">
				<!-- Switcher button -->
				<div class="switch-btn">
					<button><i class="fa fa-cog fa-spin"></i></button>
				</div>

				<!-- switcher body -->
				<div class="switch-menu">
					<h5 class="title">Style Switcher</h5>
					<!-- Theme color changer -->
					<div class="switcher-container">
						<h5>Color Skins</h5>
						<ul id="styleOptions" title="Switch Color" class="clearfix">
							<li><a href="javascript: void(0)" data-theme="color" class="color1"></a></li>
							<li><a href="javascript: void(0)" data-theme="color-2" class="color2"></a></li>
							<li><a href="javascript: void(0)" data-theme="color-3" class="color3"></a></li>
							<li><a href="javascript: void(0)" data-theme="color-4" class="color4"></a></li>
							<li><a href="javascript: void(0)" data-theme="color-5" class="color5"></a></li>
						</ul>
					</div>
				</div> <!-- /switch-menu -->
			</div> <!-- /.switcher -->



			<!--
			=============================================
				Theme Header
			==============================================
			-->
			<header class="theme-main-header theme-header-one">
				{{-- <div class="top-header">
					<div class="container clearfix">
						<p class="float-left email-us">Email us at : <a href="mailto:info@apacheconsultancy.com">info@apacheconsultancy.com</a></p>
						<p class="float-right call-us">Call us for any questions : <a href="tel:(088) 987 555 123">(088) 987 555 123</a></p>
					</div> <!-- /.container -->
				</div> <!-- /.top-header --> --}}

				<div class="theme-menu-wrapper">
					<div class="container">
						<div class="inner-wrapper clearfix">
							<!-- ================= Logo ==================== -->
							<div class="logo"><a href="index.html"><img src="{{asset('gambar/logo_admisipromosi.png')}}" alt="logo" style="width: 70px; height: 70x;"></a></div>
							<!-- ============== Menu Warpper ================ -->
					   		<div class="menu-wrapper float-right">
					   			<nav id="mega-menu-holder" class="clearfix">
								   <ul class="clearfix">
									    <li><a href="{{route('home')}}">{{__('navbar.beranda')}}</a>
									    </li>
									    <li><a href="#">{{__('navbar.tentang')}}</a>
									    	<ul class="dropdown">
									    		<li><a href="{{route('getTimUser')}}">{{__('navbar.tentang_green_sutha.tim')}}</a></li>
									    		<li><a href="{{route('getProfilKampusUser')}}">{{__('navbar.profil_kampus')}}</a></li>
									    		<li><a href="{{route('getTentangGreensuthaUser')}}">GreenSUTHA</a></li>
									    		<li><a href="{{route('getAdmisiPromosiUser')}}">Admisi Promosi</a></li>
									       </ul>
									    </li>
									    <li><a href="#">{{__('navbar.green_campus')}}</a>
									    	<ul class="dropdown">
                                                <li><a href="{{route('getPenataanUser')}}">{{__('navbar.green_sutha.penataan')}}</a></li>
                                                <li><a href="{{route('getEnergiUser')}}">{{__('navbar.green_sutha.energi')}}</a></li>
                                                <li><a href="{{route('getLimbahUser')}}">{{__('navbar.green_sutha.limbah')}}</a></li>
                                                <li><a href="{{route('getAirUser')}}">{{__('navbar.green_sutha.air')}}</a></li>
                                                <li><a href="{{route('getTransportasiUser')}}">{{__('navbar.green_sutha.transportasi')}}</a></li>
                                                <li><a href="{{route('getPendidikanUser')}}">{{__('navbar.green_sutha.pendidikan')}}</a></li>
									       </ul>
									    </li>
                                        <li><a href="#">Admisi Promosi</a>
									    	<ul class="dropdown">
                                                <li><a href="{{route('getAdmisiPromosiUser')}}">{{__('navbar.profil_pusat_kajian')}}</a></li>
									       </ul>
									    </li>
									    <li><a href="#">Event</a>
									    	<ul class="dropdown">
                                                <li><a href="{{route('getEnvironmentUser')}}">{{__('navbar.event.environment')}}</a></li>
                                                <li><a href="{{route('getStudentUser')}}">{{__('navbar.event.student')}}</a></li>
                                                <li><a href="{{route('getWebinarUser')}}">Webinar</a></li>
                                                <li><a href="{{route('getSemConUser')}}">Seminar & Conference</a></li>
                                                <li><a href="{{route('getSurveyUser')}}">Survey</a></li>
                                                <li><a href="{{route('getLokakaryaUser')}}">Lokakarya</a></li>
                                                <li><a href="{{route('getAwardUser')}}">GreenSUTHA Award</a></li>

									       </ul>
									    </li>
										<li><a href="#">{{__('navbar.publikasi')}}</a>
									    	<ul class="dropdown">
									        	<li><a href="{{route('getBukuUser')}}">{{__('navbar.publikasi_isi.buku')}}</a></li>
									        	<li><a href="{{route('getJurnalUser')}}">{{__('navbar.publikasi_isi.jurnal')}}</a></li>
									        	<li><a href="{{route('getReportUser')}}">{{__('navbar.publikasi_isi.laporan_tahunan')}}</a></li>
									        	<li><a href="{{route('getDokumenUser')}}">{{__('navbar.publikasi_isi.dokumen')}}</a></li>
									       </ul>
									    </li>
                                        <li><a href="#">{{__('navbar.penelitian_dan_pengabdian')}}</a>
									    	<ul class="dropdown">
									        	<li><a href="{{route('getPenelitianUser')}}">{{__('navbar.penelitian')}}</a></li>
									        	<li><a href="{{route('getPengabdianUser')}}">{{__('navbar.pengabdian')}}</a></li>
									       </ul>
									    </li>
										<li><a href="#">Gallery</a>
									    	<ul class="dropdown">
									        	<li><a href="{{route('getFotoUser')}}">{{__('navbar.gallery_isi.foto')}}</a></li>
									        	<li><a href="{{route('getPosterUser')}}">{{__('navbar.gallery_isi.poster')}}</a></li>
									       </ul>
									    </li>
									    <li><a href="{{route('getPostsByCategory','')}}">{{__('navbar.berita')}}</a>
									    	<ul class="dropdown">
									        	<li><a href="{{route('getPostsByCategory','Lingkungan')}}">{{__('navbar.kategori.lingkungan')}}</a></li>
									        	<li><a href="{{route('getPostsByCategory','Islam')}}">{{__('navbar.kategori.islam')}}</a></li>
									        	<li><a href="{{route('getPostsByCategory','Sosial')}}">{{__('navbar.kategori.sosial')}}</a></li>
									        	<li><a href="{{route('getPostsByCategory','Pendidikan')}}">{{__('navbar.kategori.pendidikan')}}</a></li>
									        	<li><a href="{{route('getPostsByCategory','Budaya')}}">{{__('navbar.kategori.budaya')}}</a></li>
									        	<li><a href="{{route('getPostsByCategory','Ekonomi')}}">{{__('navbar.kategori.ekonomi')}}</a></li>
									        	<li><a href="{{route('getPostsByCategory','Sains')}}">{{__('navbar.kategori.sains')}}</a></li>
									       </ul>
									    </li>
									    {{-- <li><a href="{{route('kontakUser')}}">{{__('navbar.kontak')}}</a></li> --}}
                                        <li class="has-submenu">
                                            <a href="#"> {{__('navbar.switch_language')}} </a>
                                            <ul class="dropdown">
                                                <li><a href="{{ route('localization.switch', 'en') }}" class="{{ app()->getLocale() == 'en' ? 'active' : '' }}">English</a></li>
                                                <li><a href="{{ route('localization.switch', 'id') }}" class="{{ app()->getLocale() == 'id' ? 'active' : '' }}">Indonesia</a></li>
                                            </ul>
                                        </li>
								   </ul>
								</nav> <!-- /#mega-menu-holder -->
					   		</div> <!-- /.menu-wrapper -->
						</div> <!-- /.inner-wrapper -->
					</div> <!-- /.container -->
				</div> <!-- /.theme-menu-wrapper -->
			</header> <!-- /.theme-main-header -->


			<!--
			=============================================
				Theme Main Banner
			==============================================
			-->
			<div id="theme-main-banner" class="banner-one section-spacing">
				@foreach ($banners as $banner)
				<div data-src="{{url('banner/'.$banner->gambar)}}">
					<div class="camera_caption text-center">
						<div class="container">
							{{-- <h1 class="wow fadeInUp animated"><span>Business for</span> Consuling &amp; Investment</h1>
							<p class="wow fadeInUp animated" data-wow-delay="0.2s">Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate</p>
							<a href="about.html" class="theme-button-one wow fadeInUp animated" data-wow-delay="0.278s">Read more</a> --}}
						</div> <!-- /.container -->
					</div> <!-- /.camera_caption -->
				</div>
				@endforeach
			</div> <!-- /#theme-main-banner -->
            @yield('content')
			<footer class="theme-footer-one">
				<div class="container">
					<div class="top-footer">
						{{-- <div class="logo"><a href="index.html"><img src="{{asset('frontend2/images/logo/logo.png')}}" alt="logo"></a></div> --}}
                        <div class="logo">
							{{-- <a href="index.html"><img src="images/logo/logo.png" alt="logo"></a> --}}
                            <ul>
                                <li>
                                    <i class="icon flaticon-message"></i>
                                    <h6>{{__('navbar.hubungi_kami')}}</h6>
                                    <a href="#">greensutha@uinjambi.ac.id</a>
                                </li>
                            </ul>
						</div>
						<ul class="clearfix">
							<li>
								<i class="icon flaticon-map"></i>
								<h6>{{__('navbar.kantor_kami')}}</h6>
								<a href="#">Jln. Jambi-Muara Bulian KM. 16, <br>Simp. Sei Duren, Jambi Luar kota, <br> Muaro Jambi, Jambi 36361</a>
							</li>
							<li>
								
							</li>
                            <li>
								<p>Pengunjung Hari ini: {{$countVisitorsToday}}</p>
                                <br>
                                <p>Total Pengunjung : {{$totalVisitors}}</p>
							</li>
						</ul>
					</div> <!-- /.top-footer -->
				</div> <!-- /.container -->

				<div class="main-footer-widget">
					<div class="container">
						<div class="row">
							<div class="col-lg-6 col-sm-6">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.2526154137!2d103.50530931394763!3d-1.605203998829423!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2f62e5c1f08695%3A0x7f8f4c50c46eaadc!2sUIN%20Thaha%20Saifuddin%20Jambi%20Sulthan!5e0!3m2!1sen!2sid!4v1618855954896!5m2!1sen!2sid" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" style="margin-top: 30px;"></iframe>
							</div> <!-- /.about-widget -->

                            <div class="col-lg-4 col-sm-6">

							</div> <!-- /.about-widget -->

							<div class="col-lg-2 col-sm-6 list-widget">
								<h6 class="title">{{__('index.menu_cepat')}}</h6>
								<ul>
									<li><a href="{{route('home')}}">{{__('navbar.beranda')}}</a></li>
									<li><a href="{{route('getTentangGreensuthaUser')}}">{{__('navbar.tentang')}}</a></li>
									<li><a href="{{route('getEnvironmentUser')}}">{{__('navbar.green_campus')}}</a></li>
									<li><a href="{{route('getEnvironmentUser')}}">Event</a></li>
									<li><a href="{{route('getBukuUser')}}">{{__('navbar.publikasi')}}</a></li>
                                    <li><a href="{{route('kontakUser')}}">{{__('navbar.kontak')}}</a></li>
								</ul>
							</div> <!-- /.list-widget -->

						</div> <!-- /.row -->
					</div> <!-- /.container -->
				</div> <!-- /.main-footer-widget -->

				<div class="bottom-footer">
					<div class="container">
						<p>Copyright 2018 Apache Business Consultancy – All Right Reserved</p>
					</div>
				</div> <!-- /.bottom-footer -->
			</footer> <!-- /.theme-footer -->




	        <!-- Scroll Top Button -->
			<button class="scroll-top tran3s">
				<i class="fa fa-angle-up" aria-hidden="true"></i>
			</button>



		<!-- Optional JavaScript _____________________________  -->

    	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    	<!-- jQuery -->
		<script src="{{asset('frontend2/vendor/jquery.2.2.3.min.js')}}"></script>
		<!-- Popper js -->
		<script src="{{asset('frontend2/vendor/popper.js/popper.min.js')}}"></script>
		<!-- Bootstrap JS -->
		<script src="{{asset('frontend2/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
		<!-- Style-switcher  -->
		<script src="{{asset('frontend2/vendor/jQuery.style.switcher.min.js')}}"></script>
		<!-- Camera Slider -->
		<script src="{{asset('frontend2/vendor/Camera-master/scripts/jquery.mobile.customized.min.js')}}"></script>
	    <script src="{{asset('frontend2/vendor/Camera-master/scripts/jquery.easing.1.3.js')}}"></script>
	    <script src="{{asset('frontend2/vendor/Camera-master/scripts/camera.min.js')}}"></script>
	    <!-- menu  -->
		<script src="{{asset('frontend2/vendor/menu/src/js/jquery.slimmenu.js')}}"></script>
		<!-- WOW js -->
		<script src="{{asset('frontend2/vendor/WOW-master/dist/wow.min.js')}}"></script>
		<!-- owl.carousel -->
		<script src="{{asset('frontend2/vendor/owl-carousel/owl.carousel.min.js')}}"></script>
		<!-- js count to -->
		<script src="{{asset('frontend2/vendor/jquery.appear.js')}}"></script>
		<script src="{{asset('frontend2/vendor/jquery.countTo.js')}}"></script>
		<!-- Fancybox -->
		<script src="{{asset('frontend2/vendor/fancybox/dist/jquery.fancybox.min.js')}}"></script>

		<!-- Theme js -->
		<script src="{{asset('frontend2/js/theme.js')}}"></script>
        @yield('linkfooter')
		</div> <!-- /.main-page-wrapper -->
	</body>
</html>
