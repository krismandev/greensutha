<style>
@font-face {
font-family: aclonica;
src: url('frontend/fonts/Aclonica.ttf');
}

  .site-logo{
    font-family: aclonica;
  }
</style>
<?php
  use App\Kategori;
  $kategoris = Kategori::all();

 ?>
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
                    @foreach($kategoris as $kategori)
                    <li><a href="{{route('getPostsKategori',$kategori->nama_kategori)}}">{{$kategori->nama_kategori}}</a></li>
                    @endforeach
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
