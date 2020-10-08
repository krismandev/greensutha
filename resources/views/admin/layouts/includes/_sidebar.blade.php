

<div id="sidebar-nav" class="sidebar" style="overflow-y: scroll;">
  <div class="sidebar-scroll">
    <nav>
      <ul class="nav">
        <li><a href="{{route('index_admin')}}" class="{{(request()->is('dashboard')) ? 'active' : ''}}"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
        <li><a href="{{route('getKategori')}}" class="{{(request()->is('dashboard/kategori*')) ? 'active' : ''}}"><i class="lnr lnr-tag"></i> <span>Kategori</span></a></li>
        <li><a href="{{route('getPosts')}}" class="{{(request()->is('dashboard/berita*')) ? 'active' : ''}}"><i class="lnr lnr-pencil"></i> <span>Berita</span></a></li>
        <li><a href="{{route('getBanner')}}" class="{{(request()->is('dashboard/banner*')) ? 'active' : ''}}"><i class="lnr lnr-picture"></i> <span>Banner</span></a></li>
        <li><a href="{{route('getEvent')}}" class="{{(request()->is('dashboard/event*')) ? 'active' : ''}}"><i class="lnr lnr-hourglass"></i> <span>Event</span></a></li>

        <li>
      		<a href="#green-campus" data-toggle="collapse" class="collapsed {{(request()->is('dashboard/green-campus*')) ? 'active' : ''}}" aria-expanded="false"><i class="lnr lnr-leaf"></i> <span>Green Campus</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
      		<div id="green-campus" class="collapse" aria-expanded="false" style="height: 0px;">
      			<ul class="nav">
      				<li class="{{(request()->is('dashboard/penataan&infrastruktur*')) ? 'active' : ''}}"><a href="{{route('getPenataan')}}" >Penataan & Infrastruktur </a></li>
              <li class="{{(request()->is('dashboard/energi&perubahaniklim*')) ? 'active' : ''}}"><a href="{{route('getEnergi')}}" >Energi & Perubahan Iklim </a></li>
              <li class="{{(request()->is('dashboard/limbah*')) ? 'active' : ''}}"><a href="{{route('getLimbah')}}" >Limbah </a></li>
              <li class="{{(request()->is('dashboard/air*')) ? 'active' : ''}}"><a href="{{route('getAir')}}" >Air </a></li>
              <li class="{{(request()->is('dashboard/energi&perubahaniklim*')) ? 'active' : ''}}"><a href="{{route('getTransportasi')}}" >Transportasi </a></li>
              <li class="{{(request()->is('dashboard/energi&perubahaniklim*')) ? 'active' : ''}}"><a href="{{route('getPendidikan')}}" >Pendidikan & Penelitian </a></li>
      			</ul>
      		</div>
      	</li>
        <li>
      		<a href="#galeri" data-toggle="collapse" class="collapsed {{(request()->is('dashboard/foto*') || request()->is('dashboard/poster*') ) ? 'active' : ''}}" aria-expanded="false"><i class="lnr lnr-picture"></i> <span>Galeri</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
      		<div id="galeri" class="collapse" aria-expanded="false" style="height: 0px;">
      			<ul class="nav">
      				<li class="{{(request()->is('dashboard/foto*')) ? 'active' : ''}}"><a href="{{route('getFoto')}}" >Foto </a></li>
      				<li class="{{(request()->is('dashboard/poster*')) ? 'active' : ''}}"><a href="{{route('getPoster')}}">Poster </a></li>
      			</ul>
      		</div>
      	</li>
        <li>
      		<a href="#tentang" data-toggle="collapse" class="collapsed {{(request()->is('dashboard/tentang*')) ? 'active' : ''}}" aria-expanded="false"><i class="lnr lnr-text-align-right"></i> <span>Tentang</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
      		<div id="tentang" class="collapse" aria-expanded="false" style="height: 0px;">
      			<ul class="nav">
              <li class="{{(request()->is('dashboard/logo*')) ? 'active' : ''}}"><a href="{{route('getMaknaLogo')}}" >Makna Logo </a></li>
      				<li class="{{(request()->is('dashboard/selayang-pandang*')) ? 'active' : ''}}"><a href="{{route('getSelayangPandang')}}" >Selayang Pandang </a></li>
              <li class="{{(request()->is('dashboard/kerjasama*')) ? 'active' : ''}}"><a href="{{route('getMitra')}}" >Kerja sama </a></li>

      			</ul>
      		</div>
      	</li>
        @if(auth()->user()->role == 'superadmin')
    		<li>
        	<a href="{{route('getTim')}}" class="{{(request()->is('dashboard/tim*')) ? 'active' : ''}}"><i class="lnr lnr-users"></i> <span>Tim</span></a>
        </li>
        @endif
        <li>
        	<a href="{{route('getKontak')}}" class="{{(request()->is('dashboard/kontak*')) ? 'active' : ''}}"><i class="lnr lnr-book"></i> <span>Kontak</span></a>
        </li>
        <li>
        	<a href="{{route('getPesan')}}" class="{{(request()->is('dashboard/pesan*')) ? 'active' : ''}}"><i class="lnr lnr-bubble"></i> <span>Pesan</span></a>
        </li>
      </ul>
    </nav>
  </div>
</div>
