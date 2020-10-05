@extends('admin/layouts/master')
@section('title','Profil')
@section('header')

@stop
@section('content')
@if(session('success'))

<div class="alert alert-success alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	<i class="fa fa-check-circle"></i> {{session('success')}}
</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="panel panel-profile">
	<div class="clearfix">
		<!-- LEFT COLUMN -->
		<div class="profile-left">
			<!-- PROFILE HEADER -->
			<div class="profile-header">
				<div class="overlay"></div>
				<div class="profile-main">
					<img src="{{$user->tim->getAvatar()}}" class="img-circle" alt="Avatar" style="width:100px; height:100px;">
					<h3 class="name">{{$user->name}}</h3>
					<span class="online-status status-available">Available</span>
				</div>
				<div class="profile-stat">
					<div class="row">
						<div class="col-md-6 stat-item">
							{{total_berita_saya()}}
						</div>
						<div class="col-md-6 stat-item">
							Postingan
						</div>

					</div>
				</div>
			</div>
			<!-- END PROFILE HEADER -->
			<!-- PROFILE DETAIL -->
			<div class="profile-detail">
				<div class="profile-info">
					<h4 class="heading">Basic Info</h4>
					<ul class="list-unstyled list-justify">
						<li>Nama lengkap <span>{{auth()->user()->name}}</span></li>

						<li>Email <span>{{auth()->user()->email}}</span></li>

					</ul>
				</div>
				

				<!-- <div class="text-center"><a href="#" class="btn btn-primary">Edit Profile</a></div> -->
			</div>
			<!-- END PROFILE DETAIL -->
		</div>
		<!-- END LEFT COLUMN -->
		<!-- RIGHT COLUMN -->
		<div class="profile-right">
			<div class="row">

				<div class="col-md-6">
					<h4 class="heading">Edit Profil</h4>

				</div>
				<div class="col-md-6">
		      <a href="#" class="btn btn-primary navbar-btn-right" data-toggle="modal" data-target="#ubahpassword"
		        id="btn-ubahpassword">
		        Ubah Password
		      </a>
		    </div>
			</div>

        <form class="" action="{{route('updateProfil')}}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="row mt-3" style="margin-top: 20px;">
              <div class="col-md-2">
                <span><b>Nama</b></span>
              </div>
              <div class="col-md-10">
                <input type="text" class="form-control" placeholder="Masukkan nama" name="name" value="{{$user->name}}">
              </div>
            </div>

            <div class="row mt-3" style="margin-top: 20px;">
              <div class="col-md-2">
                <span><b>Email</b></span>
              </div>
              <div class="col-md-10">
                <input type="text" class="form-control" placeholder="" name="email" value="{{$user->email}}">
              </div>
            </div>
						<div class="row mt-3" style="margin-top: 20px;">
              <div class="col-md-2">
                <span><b>Posisi</b></span>
              </div>
              <div class="col-md-10">
                <input type="text" class="form-control" placeholder="" name="posisi" value="{{$tim->posisi}}">
              </div>
            </div>

            <div class="row mt-3" style="margin-top: 20px;">
              <div class="col-md-2">
                <span><b>Foto</b></span>
              </div>
              <div class="col-md-10">
                <input type="file" class="form-control" placeholder="Masukkan foto" name="foto" value="">
              </div>
            </div>

            <div class="row mt-3" style="margin-top: 20px;">
              <div class="col-md-2">
                <span><b>Deskripsi </b></span>
              </div>
              <div class="col-md-10">
              	<textarea name="deskripsi" class="form-control" cols="50"> {{$tim->deskripsi}} </textarea>
              </div>
            </div>

            <div class="row mt-3" style="margin-top: 20px;">
              <div class="col-md-2">
                <span><b>Youtube</b></span>
              </div>
              <div class="col-md-10">
                <input type="text" class="form-control" placeholder="Masukkan link channel youtube/ medsos anda" name="yt" value="{{$tim->yt}}">
              </div>
            </div>
						<div class="row mt-3" style="margin-top: 20px;">
              <div class="col-md-2">
                <span><b>Facebook</b></span>
              </div>
              <div class="col-md-10">
                <input type="text" class="form-control" placeholder="Masukkan link facebook anda" name="fb" value="{{$tim->fb}}">
              </div>
            </div>
						<div class="row mt-3" style="margin-top: 20px;">
              <div class="col-md-2">
                <span><b>Instagram</b></span>
              </div>
              <div class="col-md-10">
                <input type="text" class="form-control" placeholder="Masukkan link instagram anda" name="ig" value="{{$tim->ig}}">
              </div>
            </div>
						<div class="row mt-3" style="margin-top: 20px;">
              <div class="col-md-2">
                <span><b>Twitter</b></span>
              </div>
              <div class="col-md-10">
                <input type="text" class="form-control" placeholder="Masukkan link twitter anda " name="twitter" value="{{$tim->twitter}}">
              </div>
            </div>
						<div class="row mt-3" style="margin-top: 20px;">
              <div class="col-md-2">
                <span><b>Linkedin</b></span>
              </div>
              <div class="col-md-10">
                <input type="text" class="form-control" placeholder="Masukkan link Linkedin anda" name="li" value="{{$tim->li}}">
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">

              </div>
              <div class="col-md-10">
                <button type="submit" name="button" class="btn btn-primary" style="margin-top: 20px;">Simpan perubahan</button>
              </div>
            </div>
        </form>

			<!-- END TABBED CONTENT -->
		</div>
		<!-- END RIGHT COLUMN -->
	</div>
</div>

<div class="modal fade" id="ubahpassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="{{route('ubahPassword')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="row form-group">
            <div class="col-md-4">
              <span>Password baru</span>
            </div>
            <div class="col-md-8">
              <input type="password" name="password" value="" class="form-control" placeholder="password baru...">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

@stop
@section('linkfooter')
<script>

</script>

@stop
