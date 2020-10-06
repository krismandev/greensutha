<style>

  @font-face {
  font-family: aclonica;
  src: {{url(frontend/fonts/Aclonica.ttf);}}
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
        </div>
        <div class="col-10">
          <nav class="site-navigation text-right" role="navigation">
            <div class="container">
              <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li class=""><a href="{{route('home')}}">Beranda</a></li>
                <li class="has-children">
                  <a href="#">Tentang</a>
                  <ul class="dropdown arrow-top">
                    <li><a href="{{route('getSelayangPandangUser')}}">Selayang Pandang</a></li>
                    <li><a href="{{route('getTimUser')}}">Tim GreenSutha</a></li>
                    <li><a href="{{route('getMitraUser')}}">Kerja sama</a></li>
                  </ul>
                </li>
                <li class="has-children">
                  <a href="#">Green Sutha</a>
                  <ul class="dropdown arrow-top">
                    <li><a href="{{route('getPenataanUser')}}">Penataan & Infrastruktur</a></li>
                    <li><a href="{{route('getEnergiUser')}}">Energi & Perubahan Iklim</a></li>
                    <li><a href="{{route('getLimbahUser')}}">Limbah</a></li>
                    <li><a href="{{route('getAirUser')}}">Air</a></li>
                    <li><a href="{{route('getTransportasiUser')}}">Transportasi</a></li>
                    <li><a href="{{route('getPendidikanUser')}}">Pendidikan & Penelitian</a></li>
                  </ul>
                </li>
                <li class="has-children">
                  <a href="#">Event</a>
                  <ul class="dropdown arrow-top">
                    <li><a href="{{route('getEventUser')}}">GreenSutha Award</a></li>
                  </ul>
                </li>
                <li class="has-children">
                  <a href="{{route('getPostsUser')}}">Berita</a>
                  <ul class="dropdown arrow-top">
                    @foreach($kategoris as $kategori)
                    <li><a href="{{route('getPostsKategori',$kategori->nama_kategori)}}">{{$kategori->nama_kategori}}</a></li>
                    @endforeach
                  </ul>
                </li>
                <li class="has-children">
                  <a href="#">Gallery</a>
                  <ul class="dropdown arrow-top">
                    <li><a href="{{route('getFotoUser')}}">Foto</a></li>
                    <li><a href="{{route('getPosterUser')}}">Poster</a></li>
                  </ul>
                </li>
                <li class="" ><a href="{{route('kontakUser')}}">Kontak</a></li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
