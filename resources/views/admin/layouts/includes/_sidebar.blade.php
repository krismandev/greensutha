

<div id="sidebar-nav" class="sidebar" style="overflow-y: scroll;">
  <div class="sidebar-scroll">
    <nav>
      <ul class="nav">
        <li><a href="" class="{{(request()->is('dashboard')) ? 'active' : ''}}"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
        <li><a href="{{route('getPosts')}}" class="{{(request()->is('dashboard/berita*')) ? 'active' : ''}}"><i class="lnr lnr-pencil"></i> <span>Berita</span></a></li>
        <li><a href="" class="{{(request()->is('dashboard/galeri*')) ? 'active' : ''}}"><i class="lnr lnr-picture"></i> <span>Galeri</span></a></li>
        <!-- <li>
    			<a href="#profil" data-toggle="collapse" class="collapsed {{(request()->is('dashboard/profil*')) ? 'active' : ''}}" aria-expanded="false"><i class="lnr lnr-users"></i> <span>Profil</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
    			<div id="profil" class="collapse" aria-expanded="false" style="height: 0px;">
    				<ul class="nav">
    					<li class="{{(request()->is('dashboard/profil/sejarah*')) ? 'active' : ''}}"><a href="" >Sejarah </a></li>
    					<li class="{{(request()->is('dashboard/profil/visimisi*')) ? 'active' : ''}}"><a href="">Visi misi </a></li>
    					<li class="{{(request()->is('dashboard/profil/struktur-organisasi*')) ? 'active' : ''}}"><a href="" class="">Struktur organisasi</a></li>
              <li class="{{(request()->is('dashboard/profil/logo*')) ? 'active' : ''}}"><a href="" class="">Makna logo</a></li>
    				</ul>
    			</div>
    		</li>
        <li>
    			<a href="#publikasi" data-toggle="collapse" class="collapsed {{(request()->is('dashboard/publikasi*')) ? 'active' : ''}}" aria-expanded="false"><i class="lnr lnr-book"></i> <span>Publikasi</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
    			<div id="publikasi" class="collapse" aria-expanded="false" style="height: 0px;">
    				<ul class="nav">
    					<li class="{{(request()->is('dashboard/publikasi/buku*')) ? 'active' : ''}}"><a href="">Buku </a></li>
    					<li class="{{(request()->is('dashboard/publikasi/jurnal*')) ? 'active' : ''}}"><a href="">Jurnal </a></li>
    				</ul>
    			</div>
    		</li>
        <li>
        	<a href="" class="{{(request()->is('dashboard/event*')) ? 'active' : ''}}"><i class="lnr lnr-list"></i> <span>Event</span></a>
        </li>
    		@if(auth()->user()->role == 'superadmin')
    		<li>
        	<a href="" class="{{(request()->is('dashboard/tim*')) ? 'active' : ''}}"><i class="lnr lnr-users"></i> <span>Tim</span></a>
        </li>
        @endif
        <li>
        	<a href="" class="{{(request()->is('dashboard/tentang*')) ? 'active' : ''}}"><i class="lnr lnr-text-align-left"></i> <span>Tentang</span></a>
        </li>


        <li>
        	<a href="" class="{{(request()->is('dashboard/pesan*')) ? 'active' : ''}}"><i class="lnr lnr-inbox"></i> <span>Pesan & Masukan</span></a>
        </li>
        <li>
        	<a href="" class="{{(request()->is('dashboard/kontak*')) ? 'active' : ''}}"><i class="lnr lnr-book"></i> <span>Kontak</span></a>
        </li> -->
      </ul>
    </nav>
  </div>
</div>
